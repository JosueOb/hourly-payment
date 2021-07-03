<?php

namespace Test\Unit;

use App\Models\Payment;
use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{

    public function testHourlyPayment()
    {
        $start = DateTime::createFromFormat("!H:i", "08:15");
        $end = DateTime::createFromFormat("!H:i", "12:45");
        $hourly_price = 20;

        $payment = payForHoursWorked($start, $end, $hourly_price);

        $this->assertIsFloat($payment);
    }

    /**
     * @throws Exception
     */
    public function testPaymentByPeriod()
    {
        //Types
        $working_day = createType("Working Day");

        //Periods
        $morning = createPeriod("00:01", "09:00");
        $afternoon = createPeriod("09:01", "18:00");
        $night = createPeriod("18:01", "00:00");

        //Prices
        $prices = [];
        $wm_price = createPrice($prices, $working_day, $morning, "25");
        array_push($prices, $wm_price);
        $wa_price = createPrice($prices, $working_day, $afternoon, "15");
        array_push($prices, $wa_price);
        $wn_price = createPrice($prices, $working_day, $night, "20");
        array_push($prices, $wn_price);

        $period_worked = createPeriod("08:15", "18:45");
        $payment = paymentByPeriod($prices, $period_worked);

        $this->assertIsFloat($payment);
    }

    /**
     * @throws Exception
     */
    public function testGetPaymentFromAString()
    {
        //Types
        $working_day = createType("Working Day");
        $holiday = createType("Holiday");

        //Periods
        $morning = createPeriod("00:01", "09:00");
        $afternoon = createPeriod("09:01", "18:00");
        $night = createPeriod("18:01", "00:00");

        //Days
        $days = [];
        $monday = createDay($days, "Monday", "MO", $working_day);
        array_push($days, $monday);
        $tuesday = createDay($days, "Tuesday", "TU", $working_day);
        array_push($days, $tuesday);
        $wednesday = createDay($days, "Wednesday", "WE", $working_day);
        array_push($days, $wednesday);
        $thursday = createDay($days, "Thursday", "TH", $working_day);
        array_push($days, $thursday);
        $friday = createDay($days, "Friday", "FR", $working_day);
        array_push($days, $friday);
        $saturday = createDay($days, "Saturday", "SA", $holiday);
        array_push($days, $saturday);
        $sunday = createDay($days, "Sunday", "SU", $holiday);
        array_push($days, $sunday);

        //Prices
        $prices = [];
        $wm_price = createPrice($prices, $working_day, $morning, "25");
        array_push($prices, $wm_price);
        $wa_price = createPrice($prices, $working_day, $afternoon, "15");
        array_push($prices, $wa_price);
        $wn_price = createPrice($prices, $working_day, $night, "20");
        array_push($prices, $wn_price);
        $hm_price = createPrice($prices, $holiday, $morning, "30");
        array_push($prices, $hm_price);
        $ha_price = createPrice($prices, $holiday, $afternoon, "20");
        array_push($prices, $ha_price);
        $hn_price = createPrice($prices, $holiday, $night, "25");
        array_push($prices, $hn_price);

        //String
        $line = "RENE=MO10:00-12:00,TU10:00-12:00,TH01:00-03:00,SA14:00-18:00,SU20:00-21:00";

        $payment = getPaymentFromAString($line, $days, $prices);

        $this->assertInstanceOf(Payment::class, $payment);
    }
}
