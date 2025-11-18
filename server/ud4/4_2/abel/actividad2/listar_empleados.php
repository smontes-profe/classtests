<?php


require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM empleados");
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($empleados) {
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>";
        foreach ($empleados as $emp) {
            echo "<tr>
                    <td>{$emp['id']}</td>
                    <td>{$emp['nombre']}</td>
                    <td>{$emp['puesto']}</td>
                    <td>{$emp['salario']}</td>
                 </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay empleados registrados.</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
