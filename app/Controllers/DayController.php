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
     * @param string $day_name
     * @param string $day_abbreviation
     * @param Type $type
     * @return Day
     * @throws Exception
     */
    static function create(string $day_name, string $day_abbreviation, Type $type): Day
    {
        $name = new TextRule($day_name);
        $abbreviation = new AbbreviationRule($day_abbreviation);

        if (!$name->isValid()) {
            throw new Exception("The name of day $name->content is invalid.", 1);
        }
        if (!$abbreviation->isValid()) {
            throw new Exception("The abbreviation of day $abbreviation->content is invalid.", 1);
        }

        return new Day($name->content, strtoupper($abbreviation->content), $type);
    }
}
