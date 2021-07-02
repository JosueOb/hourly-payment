<?php

namespace App\Rules;


class NumberRule extends Rule
{
    protected string $pattern = "/^\d+(?:\.\d+)?$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
        parent::__construct($this->pattern, $this->content);
    }
}
