<?php

namespace  App\Rules;

class Rule
{
    protected string $pattern = "";
    public string $content = "";

    protected function  __construct(string $pattern, string $content)
    {
        $this->pattern = $pattern;
        $this->content = $content;
    }

    public function isValid(): bool
    {
        if (preg_match($this->pattern, $this->content)) {
            return true;
        }
        return false;
    }

    protected function formatText(string $text): string
    {
        $format_text = $text;
        $format_text_explode = explode(" ", $format_text);
        $format_text_filter = array_filter($format_text_explode, function ($value) {
            return !empty($value);
        });
        return implode(" ", $format_text_filter);
    }
}
