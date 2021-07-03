<?php

namespace App\Controllers;

use App\Models\Payment;
use App\Models\Period;
use App\Views\PaymentView;
use DateTime;
use Exception;

class PaymentController
{

    static function index(array $payments)
    {
        $data = [];

        foreach ($payments as $payment) {
            array_push(
                $data,
                [
                    "user" => $payment->user,
                    "total" => $payment->total,
                ]
            );
        }

        $view = new PaymentView($data);
        $view->show();
    }

    /**
     * @throws Exception
     */
    static function getPayments(array $content, array $days, array $prices): array
    {
        $payments = [];
        foreach ($content as $line) {
            $payment = getPaymentFromAString($line, $days, $prices);
            array_push($payments, $payment);
        }
        return $payments;
    }

    /**
     * @throws Exception
     */
    static function getPaymentFromAString(string $line, array $days, array $prices): Payment
    {
        $line_explode = explode("=", $line);
        $user = $line_explode[0];

        $payment = new Payment($user);

        $schedule = $line_explode[1];
        $times = explode(",", $schedule);

        foreach ($times as $time) {

            $abbreviation = substr($time, 0, 2);
            $period_worked = str_replace($abbreviation, "", $time);
            $explode_period = explode("-", $period_worked);
            $start_working = $explode_period[0];
            $end_working = $explode_period[1];

            $period = createPeriod($start_working, $end_working);

            $search_days = searchDayByAbbreviation($days, $abbreviation);

            if (empty($search_days)) {
                throw new Exception("Abbreviation day $abbreviation not found.", 1);
            }

            $day = $search_days[0]; //get the first day

            $search_prices = searchPriceByType($prices, $day->type->slug);

            if (empty($search_prices)) {
                throw new Exception("Type price {$day->type->slug} not found.", 1);
            }

            $total_payment = paymentByPeriod($search_prices, $period);

            $payment->addTimeWorked($day, $period, $total_payment);
        }

        return $payment;
    }


    static function hourlyPayment(DateTime $start_working, DateTime $end_working, float $price): float
    {
        $diff = $end_working->diff($start_working);
        $hours = (int) $diff->format("%h");
        $minutes = (int) $diff->format("%i");
        return round($hours * $price + (($minutes * $price) / 60), 2);
    }

    static function paymentByPeriod(array $prices, Period $period): float
    {
        $total_payment = 0;

        foreach ($prices as $price) {
            $start_working = $period->start;
            $end_working = $period->end;

            if (
                $price->period->start <= $start_working
                && $price->period->end >= $end_working
            ) {
                $total_payment = payForHoursWorked($start_working, $end_working, $price->value);
                break; //end loop
            } else {

                if (
                    $price->period->start <= $start_working
                    && $price->period->end >= $start_working
                    && $price->period->start <= $end_working
                    && $price->period->end <= $end_working
                ) {
                    //First case
                    $end_working = $price->period->end;
                    $total_payment += payForHoursWorked($start_working, $end_working, $price->value);
                } else {
                    if (
                        $price->period->start >= $start_working
                        && $price->period->end >= $start_working
                        && $price->period->start <= $end_working
                        && $price->period->end <= $end_working
                    ) {
                        //Second case
                        $start_working = createDate($price->period->getPeriod()["start"])->modify("-1 minute");
                        $end_working = $price->period->end;
                        $total_payment += payForHoursWorked($start_working, $end_working, $price->value);
                    } else {
                        if (
                            $price->period->start >= $start_working
                            && $price->period->end >= $start_working
                            && $price->period->start <= $end_working
                            && $price->period->end >= $end_working
                        ) {
                            //Third case
                            $start_working = createDate($price->period->getPeriod()["start"])->modify("-1 minute");
                            $total_payment += payForHoursWorked($start_working, $end_working, $price->value);
                        }
                    }
                }
            }
        }
        return $total_payment;
    }
}
