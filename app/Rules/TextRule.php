<?php

namespace App\Rules;


class TextRule extends Rule
{
    protected string $pattern = "/^[[:alpha:][:space:]]+$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = $this->formatText($content);
        parent::__construct($this->pattern, $this->content);
    }
}
