<?php

use App\Controllers\DayController;
use App\Controllers\FileController;
use App\Controllers\PaymentController;
use App\Controllers\PeriodController;
use App\Controllers\PriceController;
use App\Controllers\TypeController;
use App\Models\Day;
use App\Models\Payment;
use App\Models\Period;
use App\Models\Price;
use App\Models\Type;

if (!function_exists('createType')) {
    /**
     * @throws Exception
     */
    function createType($name): Type
    {
        return TypeController::create($name);
    }
}

if (!function_exists('createPeriod')) {
    /**
     * @throws Exception
     */
    function createPeriod($start, $end): Period
    {
        return PeriodController::create($start, $end);
    }
}

if (!function_exists('createDay')) {
    /**
     * @throws Exception
     */
    function createDay($days, $name, $abbreviation, $type): Day
    {
        return DayController::create($days, $name, $abbreviation, $type);
    }
}

if (!function_exists('createPrice')) {
    /**
     * @throws Exception
     */
    function createPrice($prices, $type, $period, $value): Price
    {
        return PriceController::create($prices, $type, $period, $value);
    }
}

if (!function_exists('redFile')) {

    /**
     * @throws Exception
     */
    function redFile($file): array
    {
        return FileController::readFile($file);
    }
}

if (!function_exists('searchDayByAbbreviation')) {
    function searchDayByAbbreviation($days, $abbreviation): array
    {
        return DayController::searchDayByAbbreviation($days, $abbreviation);
    }
}

if (!function_exists('searchPriceByType')) {
    function searchPriceByType($prices, $type): array
    {
        return PriceController::searchPriceByType($prices, $type);
    }
}

if (!function_exists('payForHoursWorked')) {

    function payForHoursWorked($start, $end, $hourly_price): float
    {
        return PaymentController::hourlyPayment($start, $end, $hourly_price);
    }
}

if (!function_exists('paymentByPeriod')) {

    function paymentByPeriod($prices, $period): float
    {
        return PaymentController::paymentByPeriod($prices, $period);
    }
}

if (!function_exists('getPaymentFromAString')) {
    /**
     * @throws Exception
     */
    function getPaymentFromAString($line, $days, $prices): Payment
    {
        return PaymentController::getPaymentFromAString($line, $days, $prices);
    }
}

if (!function_exists('getPayments')) {
    function getPayments($content, $days, $prices): array
    {
        return PaymentController::getPayments($content, $days, $prices);
    }
}

if (!function_exists('showPayments')) {
    function showPayments($payments)
    {
        return PaymentController::index($payments);
    }
}
if (!function_exists('createDate')) {
    function createDate($date): DateTime|bool
    {
        return DateTime::createFromFormat("!H:i", $date);
    }
}
