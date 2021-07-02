<?php

namespace App\Models;

class Type
{
    public string $name;
    public string $slug;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->slug = strtolower(str_replace(" ", "-", $this->name));
    }
}
