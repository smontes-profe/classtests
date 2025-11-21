<?php
// Cargar configuración (DSN)
require_once __DIR__ . '/../1/config.php';

$results = [];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si se proporciona nombre, buscar con LIKE (prepared statement)
    if (!empty($_GET['nombre'])) {
        $nombre = '%' . $_GET['nombre'] . '%';
        $sql = 'SELECT * FROM empleados WHERE nombre LIKE :nombre';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    // Error crítico de BBDD
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