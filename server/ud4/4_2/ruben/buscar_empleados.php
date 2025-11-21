<?php
require_once "config.php"; 
require_once "conexion.php";  
$empleados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = "%" . $_POST["nombre"] . "%";

    $sql = "SELECT * FROM empleados WHERE nombre LIKE :nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->execute();

    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Empleado</title>
</head>
<body>

<h2>Buscar Empleado por Nombre</h2>

<form method="post">
    <input type="text" name="nombre" placeholder="Ingrese nombre">
    <button type="submit">Buscar</button>
</form>
<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (count($empleados) > 0) {

        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>";

        foreach ($empleados as $emp) {
            echo "<tr>";
            echo "<td>" . $emp["id"] . "</td>";
            echo "<td>" . $emp["nombre"] . "</td>";
            echo "<td>" . $emp["puesto"] . "</td>";
            echo "<td>" . $emp["salario"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "No se encontraron empleados.";
    }
}
?>

</body>
</html>