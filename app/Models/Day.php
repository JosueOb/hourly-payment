<?php

namespace App\Models;

class Day
{
    public string $name;
    public string $abbreviation;
    public Type $type;

    public function __construct(string $name, string $abbreviation, Type $type)
    {
        $this->name = $name;
        $this->abbreviation = $abbreviation;
        $this->type = $type;
    }
}
