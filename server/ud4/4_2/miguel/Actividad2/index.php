<?php

require 'bootstrapAct2.php';

try {

    $config = Config\DatabaseAct2::getAll();
    $connection = new Database\ConnectionAct2($config);
    $dpo = $connection->getConnection();

    // Usar el QueryBuilder para obtener todos los empleados
    $builder = new Database\QueryBuilder($dpo);
    
    // Obtener todos los empleados
    $empleados = $builder->table('empleados')->get();

    if (empty($empleados)) {
        echo "<p>No se encontraron usuarios.</p>";
    } else {
        echo "<ul>";
        foreach ($empleados as $empleado) {
            echo "<li>ID: {$empleado['id']} | Nombre: {$empleado['nombre']} | Puesto: {$empleado['puesto']} | Salario: {$empleado['salario']}</li>";
        }
        echo "</ul>";
    }

} catch (\Exception $e) {
    echo "<h1>Ha ocurrido un Error:</h1>";
    echo "<p style='color: red;'>Detalle: " . $e->getMessage() . "</p>";
}
