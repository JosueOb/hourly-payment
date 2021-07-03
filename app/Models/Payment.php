<?php

namespace App\Models;

class Payment
{
    public string $user;
    public array $time_worked;
    public float $total;

    public function __construct(string $user, array $time_worked = [], float $total = 0)
    {
        $this->user = $user;
        $this->time_worked = $time_worked;
        $this->total = $total;
    }
    public function addTimeWorked(Day $day, Period $period, float $payment)
    {
        $time_worked = [
            'day' => $day,
            'period' => $period,
            'payment' => $payment
        ];
        array_push($this->time_worked, $time_worked);
        $this->total += $payment;
    }
}
