<?php

require 'bootstrap.php';

try {

    // Configuración y conexión a la base de datos usando inyección de dependencias
    $config = Config\Database::getAll();
    $connection = new Database\Connection($config);
    $dpo = $connection->getConnection();

    echo "<h1>¡CONEXIÓN EXITOSA (con Inyección de Dependencias)!</h1>";
    echo "<p style='color: green;'>PHP se ha conectado correctamente a la base de datos.</p>";

} catch (\Exception $e) {
    echo "<h1>Ha ocurrido un Error:</h1>";
    echo "<p style='color: red;'>Detalle: " . $e->getMessage() . "</p>";
}
