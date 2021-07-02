<?php

use App\Controllers\TypeController;
use App\Models\Type;

function createType($name): Type
{
    return TypeController::create($name);
}
