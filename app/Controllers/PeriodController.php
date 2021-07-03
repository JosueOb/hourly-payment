<?php

namespace App\Controllers;

use App\Models\Period;
use App\Rules\HourRule;
use DateTime;
use Exception;

class PeriodController
{
    /**
     * @param string $time_start
     * @param string $time_end
     * @return Period
     * @throws Exception
     */
    static function create(string $time_start, string $time_end): Period
    {
        $start = new HourRule($time_start);
        $end = new HourRule($time_end);

        if (!$start->isValid()) {
            throw new Exception("The start time $start->content is invalid.", 1);
        }
        if (!$end->isValid()) {
            throw new Exception("The end time $end->content is invalid.", 1);
        }

        $start_date = DateTime::createFromFormat("!H:i", $start->content);
        $end_date = DateTime::createFromFormat("!H:i", $end->content);

        if ($end_date == DateTime::createFromFormat("!H:i", "00:00")) {
            $end_date = $end_date->modify("+1 day");
        }

        if ($start_date > $end_date) {
            throw new Exception("The first hour $start->content must be less than the second hour $end->content.", 1);
        }

        if ($start_date === $end_date) {
            throw new Exception("The first hour $start->content must be different from the second hour $end->content.", 1);
        }

        return new Period($start_date, $end_date);
    }
}
