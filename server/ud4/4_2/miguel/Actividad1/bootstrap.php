<?php

// Autoloading de clases usando PSR-4, llamada por namespace
spl_autoload_register(function($className) {
   // Reemplaza los backslashes por el separador de directorios adecuado
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    // Construye la ruta completa al archivo de la clase
    $path = __DIR__ . '/src/' . $file . '.php';

    if (file_exists($path)) {
        // Incluir el archivo de la clase una vez
        require_once $path;
    }
});

 