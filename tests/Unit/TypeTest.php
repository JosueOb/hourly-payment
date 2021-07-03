<?php

namespace Test\Unit;

use App\Controllers\TypeController;
use App\Models\Type;
use Exception;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCreateType()
    {
        $type = createType("Working Day");
        $slug = $type->slug;

        $this->assertInstanceOf(Type::class, $type);
        $this->assertMatchesRegularExpression("/^[a-z0-9]+(?:-[a-z0-9]+)*$/", $slug);
    }
}
