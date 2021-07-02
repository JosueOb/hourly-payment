<?php

namespace App\Rules;

class AbbreviationRule
{
    protected string $pattern = "/^[a-zA-Z]{2,3}+$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = strtoupper(trim($content));
    }

    public function isValid(): bool
    {
        if (preg_match($this->pattern, $this->content)) {
            return true;
        }
        return false;
    }
}
