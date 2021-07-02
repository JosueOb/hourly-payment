<?php

namespace App\Controllers;

use App\Models\Period;
use App\Models\Price;
use App\Models\Type;
use App\Rules\NumberRule;
use Exception;

class PriceController
{

    /**
     * @param Type $type
     * @param Period $period
     * @param string $value
     * @return Price
     * @throws Exception
     */
    static function create(Type $type, Period $period, string $value): Price
    {
        $number = new NumberRule($value);

        if (!$number->isValid()) {
            throw new Exception("The price $number->content is invalid.", 1);
        }

        return new Price($type, $period, (float) $value);
    }
}
