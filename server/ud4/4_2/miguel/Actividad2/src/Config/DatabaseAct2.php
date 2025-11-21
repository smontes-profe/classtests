<?php

namespace Config;

use Exception;

class DatabaseAct2
{

    private static ?array $config = null;

    private static function load(): void
    {

        if (self::$config !== null) {
            return;
        }

        $envFile = dirname(__DIR__, 2) . '/.env';

        if (!file_exists($envFile)) {
            throw new \Exception(".env file not found {$envFile}");
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $parsedConfig = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line) || str_starts_with($line, '#')) {
                continue;
            }

            if (str_contains($line, '=')) {
                [$key, $value] = explode('=',$line, 2);


                $key = trim($key);
                $value = trim($value, " \t\n\r\0\x0B\" ");

                $parsedConfig[$key] = $value;
            }
        }

        self::$config = $parsedConfig;
    }




    public static function getAll(): array
    {
        self::load();
        return self::$config;
    }
}
