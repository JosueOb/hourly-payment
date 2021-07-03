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
        $type = createType("Working Day");
        $morning = createPeriod("09:00", "18:00");

        $prices = [
            //PriceController::create([], $type, $morning, "15")
        ];

        $price = createPrice($prices, $type, $morning, "15");

        $this->assertInstanceOf(Price::class, $price);
    }

    /**
     * @throws Exception
     */
    public function testSearchPriceByType()
    {
        //Types
        $working_day = createType("Working Day");
        $holiday = createType("Holiday");

        //Periods
        $morning = createPeriod("00:01", "09:00");
        $afternoon = createPeriod("09:01", "18:00");

        //Prices
        $prices = [];
        $wm_price = createPrice($prices, $working_day, $morning, "25");
        array_push($prices, $wm_price);
        $ha_price = createPrice($prices, $holiday, $afternoon, "20");
        array_push($prices, $ha_price);

        $search_price1 = searchPriceByType($prices, $working_day->slug);
        $search_price2 = searchPriceByType($prices, "hello");

        $this->assertIsArray($search_price1);
        $this->assertEmpty($search_price2);
    }
}
