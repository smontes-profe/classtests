<?php
require_once "config.php";
require_once "conexion.php";  
// Consulta
$sql = "SELECT * FROM empleados";
$result = mysqli_query($pdo, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
</head>
<body>

<h2>Listado de Empleados</h2>

<?php
if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['puesto'] . "</td>";
        echo "<td>" . $row['salario'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "No hay empleados registrados.";
}

mysqli_close($conn);
?>

</body>
</html>