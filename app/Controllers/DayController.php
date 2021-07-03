<?php

namespace App\Controllers;

use App\Models\Type;
use App\Models\Day;
use App\Rules\AbbreviationRule;
use App\Rules\TextRule;
use Exception;

class DayController
{
    /**
     * @param array $days
     * @param string $day_name
     * @param string $day_abbreviation
     * @param Type $type
     * @return Day
     * @throws Exception
     */
    static function create(array $days, string $day_name, string $day_abbreviation, Type $type): Day
    {
        $name = new TextRule($day_name);
        $abbreviation = new AbbreviationRule($day_abbreviation);

        if (!$name->isValid()) {
            throw new Exception("The name of day $name->content is invalid.", 1);
        }
        if (!$abbreviation->isValid()) {
            throw new Exception("The abbreviation of day $abbreviation->content is invalid.", 1);
        }

        if (!empty(searchDayByAbbreviation($days, $abbreviation->content))) {
            throw new Exception("Abbreviation of the day $abbreviation->content already recorded.", 1);
        }

        return new Day($name->content, strtoupper($abbreviation->content), $type);
    }

    /**
     * @param array $days
     * @param string $search
     * @return array
     */
    static function searchDayByAbbreviation(array $days, string $search): array
    {
        return array_values(
            array_filter(
                $days,
                function (Day $day) use ($search) {
                    return $day->abbreviation === $search;
                }
            )
        );
    }

    /**
     * @param array $days
     * @return array
     */
    static function getAbbreviations(array $days): array
    {
        $abbreviations = [];
        foreach ($days as $day){
            array_push($abbreviations, $day->abbreviation);
        }
        return $abbreviations;
    }
}
