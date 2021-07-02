<?php

namespace App\Models;

class Type
{
    public string $name;
    protected string $slug = "";

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getSlug(): string
    {
        $slug = strtolower(str_replace(" ", "-", $this->name));
        $this->slug = $slug;
        return $this->slug;
    }
}
