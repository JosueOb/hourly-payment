<?php

namespace App\Controllers;

use App\Models\Type;
use App\Rules\TextRule;
use Exception;

class TypeController
{
    /**
     * @param string $type_name
     * @return Type
     * @throws Exception
     */
    static function create(string $type_name): Type
    {
        $name = new TextRule($type_name);

        if (!$name->isValid()) {
            throw new Exception("The type name $name->content is invalid.", 1);
        }

        return new Type($name->content);
    }
}
