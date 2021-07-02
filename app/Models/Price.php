<?php

namespace App\Models;

class Price
{
    public Type $type;
    public Period $period;
    public float $value;

    public function __construct(Type $type, Period $period, float $value)
    {
        $this->type = $type;
        $this->period = $period;
        $this->value = $value;
    }
}
