<?php

namespace Test\Unit;

use App\Controllers\PeriodController;
use App\Models\Period;
use Exception;
use PHPUnit\Framework\TestCase;

class PeriodTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testCreateType()
    {
        $morning = PeriodController::create("09:00", "18:00");
        $period = $morning->getPeriod();

        $this->assertInstanceOf(Period::class, $morning);
        $this->assertIsArray($period);
    }
}
