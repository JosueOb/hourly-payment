<?php

namespace App\Rules;


class FileContentRule extends Rule
{
    protected string $pattern = "/^[a-zA-Z]{3,25}\=(\,?(MO|TU|WE|TH|FR|SA|SU)((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9])\-((0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]))+$/";
    public string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
        parent::__construct($this->pattern, $this->content);
    }
}
