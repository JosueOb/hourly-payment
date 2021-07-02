<?php

use App\Controllers\FileController;

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

    //Periods
    $morning = createPeriod("00:01", "09:00");
    $afternoon = createPeriod("09:01", "18:00");
    $night = createPeriod("18:01", "00:00");
    //var_dump($morning, $afternoon, $night);

    //Prices
    $wm_price = createPrice($working_day, $morning, "25");
    $wa_price = createPrice($working_day, $afternoon, "25");
    $wn_price = createPrice($working_day, $night, "20");
    $hm_price = createPrice($holiday, $morning, "30");
    $ha_price = createPrice($holiday, $afternoon, "20");
    $hn_price = createPrice($holiday, $night, "25");
    //var_dump($wm_price, $wa_price, $wn_price);
    //var_dump($hm_price, $ha_price, $hn_price);

    $prices = [$wm_price, $wa_price, $wn_price, $hm_price, $ha_price, $hn_price];
    //var_dump($prices);

    //File
    $file = redFile("data.txt");
    var_dump($file);
} catch (Exception $e) {
    echo "Error: {$e->getMessage()} \n";
    die();
}

echo "Continua...\n";
