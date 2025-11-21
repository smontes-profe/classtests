<?php

spl_autoload_register(function($className) {
    $file = str_replace('\\' , DIRECTORY_SEPARATOR, $className);
    $path = __DIR__ . '/src/' . $file . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});