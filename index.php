<?php

use App\Controllers\TypeController;

require __DIR__ . "/vendor/autoload.php";

/**
 * Records
 */

try {
    //Types
    $working_day = createType("Working Day");
    $holiday = createType("Holiday");
    //var_dump($working_day, $holiday);

    //Days
    $monday = createDay("Monday", "MO", $working_day);
    $tuesday = createDay("Tuesday", "TU", $working_day);
    $wednesday = createDay("Wednesday", "WE", $working_day);
    $thursday = createDay("Thursday", "TH", $working_day);
    $friday = createDay("Friday", "FR", $working_day);
    $saturday = createDay("Saturday", "SA", $holiday);
    $sunday = createDay("Sunday", "SU", $holiday);
    //var_dump($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $saturday);

    $days = [$monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $saturday];
    //var_dump($days);
} catch (Exception $e) {
    echo "Error: {$e->getMessage()} \n";
    die();
}

echo "Continua...\n";
