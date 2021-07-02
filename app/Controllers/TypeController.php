<?php

namespace App\Controllers;

use App\Models\Type;
use App\Rules\TextRule;
use Exception;

class TypeController
{
    /**
     * @param string $name
     * @return Type
     * @throws Exception
     */
    static function create(string $name): Type
    {
        $text = new TextRule($name);

        if ($text->isValid()) {
            return new Type($text->content);
        } else {
            throw new Exception("The type name $name is invalid.", 1);
        }
    }
}
