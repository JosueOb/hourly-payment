<?php

use App\Controllers\DayController;
use App\Controllers\TypeController;
use App\Models\Day;
use App\Models\Type;

/**
 * @throws Exception
 */
function createType($name): Type
{
    return TypeController::create($name);
}

/**
 * @throws Exception
 */
function createDay($name, $abbreviation, $type): Day
{
    return DayController::create($name, $abbreviation, $type);
}
