<?php

namespace Test\Unit;

use App\Controllers\FileController;
use Exception;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testReadFile()
    {
        $file_content = redFile('data.txt');

        $this->assertIsArray($file_content);
    }
}
