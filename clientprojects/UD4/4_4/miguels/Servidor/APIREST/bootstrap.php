<?php

// Autoloader tipo PSR-4: convierte namespace a ruta de archivo
// Ejemplo: Database\QueryBuilder se convierte en src/Database/QueryBuilder.php
spl_autoload_register(function($className) {
    $file = str_replace('\\' , DIRECTORY_SEPARATOR, $className);
    $path = __DIR__ . '/src/' . $file . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});