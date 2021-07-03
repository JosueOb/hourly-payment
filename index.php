<?php

require __DIR__ . "/vendor/autoload.php";


try {
    /**
     * Records
     */

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

    /**
     * Get records from a file .txt
     */

    //File
    $file = redFile("data.txt", $days);

    /**
     * Get payment set
     */
    $payments = getPayments($file, $days, $prices);

    /**
     * Show payments
     */
    showPayments($payments);
} catch (Exception $e) {
    echo "Error: {$e->getMessage()} \n";
    die();
}
