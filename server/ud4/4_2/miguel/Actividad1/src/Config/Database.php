<?php

namespace Config;

use Exception;

class Database
{
    private static ?array $config = null;

    // Función estática que nos permite traducir los datos del .env en datos que php puede manipular
    private static function load(): void
    {

        // Al ser estática debemos de usar self y usamos los :: para acceder a los métodos y propiedades estáticas
        if (self::$config !== null) {
            return;
        }

        // Ruta al archivo .env
        $envFile = dirname(__DIR__, 2) . '/.env';

        if (!file_exists($envFile)) {
            //throw new \Exception(".env file not found at {$envFile}");
        }

        // Leer el archivo .env, línea por línea, ignorando líneas vacías y saltos de línea
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $parsedConfig = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line) || str_starts_with($line, '#')) {
                continue;
            }


            if (str_contains($line, '=')) {
                // Guardamos la clave y el valor separados por el primer '=' encontrado
                [$key, $value] = explode('=', $line, 2);


                $key = trim($key);
                $value = trim($value, " \t\n\r\0\x0B\"'");

                $parsedConfig[$key] = $value;
            }
        }

        self::$config = $parsedConfig;
    }

    // Método estático para obtener toda la configuración de la base de datos
    public static function getAll(): array
    {
        self::load();
        return self::$config;
    }
}
