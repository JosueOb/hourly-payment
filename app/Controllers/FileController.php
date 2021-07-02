<?php

namespace  App\Controllers;

use App\Rules\FileContentRule;
use Exception;

class FileController
{
    private const EXTENSION = "txt";
    private const SIZE = 1048576; //bytes = 1MB

    /**
     * @param string $file_path
     * @return array
     * @throws Exception
     */
    static function readFile(string $file_path): array
    {
        if (!is_file($file_path)) {
            throw new Exception("File not found.", 1);
        }
        if (pathinfo($file_path)['extension'] !== self::EXTENSION) {
            throw new Exception("The file must be a .txt", 1);
        }
        if (filesize($file_path) > self::SIZE) {
            $to_mb = self::SIZE / 1048576;
            throw new Exception("The file must be less than $to_mb MB.", 1);
        }

        $file_open = fopen($file_path, "r");
        $position = 0; //pointer
        $content = [];

        while (!feof($file_open)) {
            $position++;
            $line = fgets($file_open);
            $line = new FileContentRule($line);

            if (!$line->isValid()) {
                fclose($file_open);
                throw new Exception("Line $position of the file doesn't conform to the format.", 1);
            }

            array_push($content, $line->content);
        }
        fclose($file_open);

        return $content;
    }
}
