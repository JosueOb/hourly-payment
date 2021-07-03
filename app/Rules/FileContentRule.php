<?php

namespace App\Rules;


class FileContentRule extends Rule
{
    //protected string $pattern = "/^[a-zA-Z]{3,25}\=(\,?(MO|TU|WE|TH|FR|SA|SU)((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9])\-((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]))+$/";
    public string $content;
    protected string $pattern;

    public function __construct(string $content, array $days)
    {
        $pattern_days = implode( "|", $days);
        $this->pattern = "/^[a-zA-Z]{3,25}\=(\,?($pattern_days)((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9])\-((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]))+$/";
        $this->content = trim($content);
        parent::__construct($this->pattern, $this->content);
    }
}
