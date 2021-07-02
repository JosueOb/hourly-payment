<?php

namespace Test\Unit;

use App\Controllers\PeriodController;
use App\Controllers\PriceController;
use App\Controllers\TypeController;
use App\Models\Price;
use Exception;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCreatePeriod()
    {
        $type = TypeController::create("Working Day");
        $morning = PeriodController::create("09:00", "18:00");

        $price = PriceController::create($type, $morning, "15");

        $this->assertInstanceOf(Price::class, $price);
    }
}
