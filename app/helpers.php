<?php

use App\Controllers\DayController;
use App\Controllers\FileController;
use App\Controllers\PeriodController;
use App\Controllers\PriceController;
use App\Controllers\TypeController;
use App\Models\Day;
use App\Models\Period;
use App\Models\Price;
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

/**
 * @throws Exception
 */
function createPeriod($start, $end): Period
{
    return PeriodController::create($start, $end);
}

/**
 * @throws Exception
 */
function createPrice($type, $period, $value): Price
{
    return PriceController::create($type, $period, $value);
}

/**
 * @throws Exception
 */
function redFile($file): array
{
    return FileController::readFile($file);
}
