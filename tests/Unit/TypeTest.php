<?php

namespace Test\Unit;

use App\Controllers\TypeController;
use App\Models\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testType()
    {
        $type = TypeController::create("Working Day");
        $slug = $type->getSlug();

        $this->assertInstanceOf(Type::class, $type);
        $this->assertMatchesRegularExpression("/^[a-z0-9]+(?:-[a-z0-9]+)*$/", $slug);
    }
}
