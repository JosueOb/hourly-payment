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
     * @param array $prices
     * @param Type $type
     * @param Period $period
     * @param string $value
     * @return Price
     * @throws Exception
     */
    static function create(array $prices, Type $type, Period $period, string $value): Price
    {
        $number = new NumberRule($value);

        if (!$number->isValid()) {
            throw new Exception("The price $number->content is invalid.", 1);
        }

        $search_prices = self::searchPriceByType($prices, $type->slug);
        if (!empty($search_prices)) {
            foreach ($search_prices as $price) {
                if (
                    $price->period->start === $period->start
                    && $price->period->end === $period->end
                ) {
                    throw new Exception("The price $type->name {$period->getPeriod()["start"]} - {$period->getPeriod()["end"]} $ $number->content is already recorded.", 1);
                }
            }
        }

        return new Price($type, $period, (float) $value);
    }

    /**
     * @param array $prices
     * @param $search
     * @return array
     */
    static function searchPriceByType(array $prices, $search): array
    {
        //esto se realiza para retornar la key del arreglo a 0 ya que sino se entregaba la key del arreglo original
        return array_values(
            array_filter(
                $prices,
                function (Price $price) use ($search) {
                    return $price->type->slug === $search;
                }
            )
        );
    }
}
