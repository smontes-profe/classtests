<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Empleado</title>
</head>
<body>
    <form method="get" action="">
        Nombre empleado: <input type="text" name="nombre">
        <input type="submit" value="Buscar">
    </form>

    <?php
    if (isset($_GET['nombre'])) {
        try {
            $nombre = trim($_GET['nombre']);
            $sql = "SELECT * FROM empleados WHERE nombre LIKE :nombre";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['nombre' => "%$nombre%"]);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($resultados) {
                echo "<table border='1' cellpadding='5' cellspacing='0'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario (€)</th></tr>";
                foreach ($resultados as $fila) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['puesto']) . "</td>";
                    echo "<td>" . number_format($fila['salario'], 2) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No se encontraron empleados con ese nombre.</p>";
            }

        } catch (PDOException $e) {
            echo "<p>Error en la búsqueda: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
</body>
</html>
