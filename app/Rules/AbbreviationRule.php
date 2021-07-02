<?php

namespace App\Rules;


class AbbreviationRule extends Rule
{
    protected string $pattern = "/^[a-zA-Z]{2,3}+$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = $this->formatText($content);
        parent::__construct($this->pattern, $this->content);
    }
}
