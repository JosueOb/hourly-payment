<?php

namespace Test\Unit;

use App\Controllers\FileController;
use Exception;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testReadFile()
    {
        //Types
        $working_day = createType("Working Day");
        $holiday = createType("Holiday");
        
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

        $file_content = redFile('data.txt', $days);

        $this->assertIsArray($file_content);
    }
}
