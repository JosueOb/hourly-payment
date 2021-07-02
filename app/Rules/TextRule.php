<?php

namespace App\Rules;

class TextRule
{
    protected string $pattern = "/^[[:alpha:][:space:]]+$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = trim($content);
    }

    public function isValid(): bool
    {
        if (preg_match($this->pattern, $this->content)) {
            return true;
        }
        return false;
    }
}
