<?php

namespace Test\Unit;

use App\Models\Day;
use App\Models\Type;
use Exception;
use PHPUnit\Framework\TestCase;

class DayTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCreateDay()
    {
        $type = createType("Working Day");

        $days = [
            //createDay([], 'Monday', "MO", $type)
        ];

        $day = createDay($days, 'Monday', "MO", $type);

        $this->assertInstanceOf(Day::class, $day);
        $this->assertInstanceOf(Type::class, $day->type);
    }

    /**
     * @throws Exception
     */
    public function testSearchDayByAbbreviation()
    {
        //Types
        $working_day = createType("Working Day");
        $holiday = createType("Holiday");

        //Days
        $days = [];
        $monday = createDay($days, "Monday", "MO", $working_day);
        array_push($days, $monday);
        $sunday = createDay($days, "Sunday", "SU", $holiday);
        array_push($days, $sunday);

        $search_days1 = searchDayByAbbreviation($days, 'SU');
        $search_days2 = searchDayByAbbreviation($days, 'HELLO');

        $this->assertIsArray($search_days1);
        $this->assertInstanceOf(Day::class, $search_days1[0]);
        $this->assertEmpty($search_days2);
    }
}
