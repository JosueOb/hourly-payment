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
}
