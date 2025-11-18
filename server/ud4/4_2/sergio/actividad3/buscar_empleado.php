<?php
//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';

//Array para que se guarde los resultados de la busqueda
$results = [];

//Intento conectar y hacer la busqueda
try {
$pdo = new PDO($dsn, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Busco si el usuario ha escrito algo en el formulario
if (!empty($_GET['nombre'])) {

//Utilizo el % para poder encontrar los nombres
$nombre = '%' . $_GET['nombre'] . '%';

//Uso prepared statements para que sea mas seguro y no puedan meter cosas maliciosas
$sql = 'SELECT * FROM empleados WHERE nombre LIKE :nombre';
$stmt = $pdo->prepare($sql);

//Vinculo el :nombre con mi variable
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);

//Ejecuto la consulta
$stmt->execute();

//Guardo los resultados en el array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Si hay error muestro el mensaje
} catch (PDOException $e) {
die('Error: ' . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Buscar empleado</title>
</head>
<body>
<h1>Buscar empleado por nombre</h1>

<!--Formulario de busqueda-->
<form method="get">
<input type="text" name="nombre" placeholder="Introduce nombre" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
<button type="submit">Buscar</button>
</form>


<?php if (isset($_GET['nombre'])): ?>
<h2>Resultados</h2>
<?php if (count($results) === 0): ?>
<!--Mensaje si no encuentra nada-->
<p>No se encontraron empleados.</p>
<?php else: ?>
<!--Tabla con los resultados-->
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
<?php foreach ($results as $r): ?>
<tr>
<td><?= htmlspecialchars($r['id']) ?></td>
<td><?= htmlspecialchars($r['nombre']) ?></td>
<td><?= htmlspecialchars($r['puesto']) ?></td>
<td><?= htmlspecialchars($r['salario']) ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
<?php endif; ?>
</body>
</html>