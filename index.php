<?php

use App\Controllers\TypeController;

require __DIR__ . "/vendor/autoload.php";

/**
 * Records
 */

try {
    //Types
    $working_day = createType("Working Day");
    $holiday = createType(" Holiday ");
    //var_dump($working_day->getSlug());
    //var_dump($holiday->getSlug());



} catch (Exception $e) {
    echo "Error: {$e->getMessage()} \n";
    die();
}

echo "Continua...\n";
