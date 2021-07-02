<?php

namespace App\Rules;


class HourRule extends Rule
{
    protected string $pattern = "/^((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9])$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
        parent::__construct($this->pattern, $this->content);
    }
}
