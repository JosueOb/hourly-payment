<?php

namespace Test\Unit;

use App\Controllers\DayController;
use App\Controllers\TypeController;
use App\Models\Day;
use App\Models\Type;
use Exception;
use PHPUnit\Framework\TestCase;

class DayTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCreateDay()
    {
        $type = TypeController::create("Working Day");
        $day = DayController::create("Monday", "MO", $type);

        $this->assertInstanceOf(Day::class, $day);
        $this->assertInstanceOf(Type::class, $day->type);
    }
}
