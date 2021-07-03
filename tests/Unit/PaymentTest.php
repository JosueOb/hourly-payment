<?php

namespace Test\Unit;

use DateTime;
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
}
