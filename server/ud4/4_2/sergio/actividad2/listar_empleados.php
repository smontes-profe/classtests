<?php
//Cargo la configuracion de la base de datos
require_once __DIR__ . '/../actividad1/config.php';


try {
//Conexion a la base de datos
$pdo = new PDO($dsn, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Saco todo los empleados de la tabla
$stmt = $pdo->query('SELECT * FROM empleados');

//Lo guardo en un array asociativo para poder usarlo en el html
$empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Si falla se corta el programa y se muesta el error
} catch (PDOException $e) {
die('Error: ' . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de empleados</title>
</head>
<body>
<h1>Empleados</h1>

<!--Muestro un mensaje para cuando la tabla esta vacia-->
<?php if (count($empleados) === 0): ?>
<p>No hay empleados registrados.</p>
<?php else: ?>

<!--Tabla para los datos del empleado-->
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
<?php foreach ($empleados as $e): ?>
<tr>
<td><?= htmlspecialchars($e['id']) ?></td>
<td><?= htmlspecialchars($e['nombre']) ?></td>
<td><?= htmlspecialchars($e['puesto']) ?></td>
<td><?= htmlspecialchars($e['salario']) ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>