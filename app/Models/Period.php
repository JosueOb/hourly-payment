<?php

namespace App\Models;

use DateTime;

class Period
{
    public DateTime $start;
    public DateTime $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getPeriod(): array
    {
        return [
            "start" => $this->start->format("H:i"),
            "end" => $this->end->format("H:i")
        ];
    }
}
