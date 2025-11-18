<?php
require_once 'conexion.php';
$pdo = getPDO();

$term = '';
$resultados = [];

if (isset($_GET['q'])) {
    $term = trim($_GET['q']);
    try {
        $sql = "SELECT id, nombre, puesto, salario FROM empleados WHERE nombre LIKE :nombre ORDER BY nombre";
        $stmt = $pdo->prepare($sql);
        $like = '%' . $term . '%';
        $stmt->bindParam(':nombre', $like, PDO::PARAM_STR);
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Error en la búsqueda: " . htmlspecialchars($e->getMessage()));
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Buscar empleado</title></head>
<body>
    <h1>Buscar empleado por nombre</h1>
    <form method="get" action="">
        <input type="text" name="q" value="<?= htmlspecialchars($term) ?>" placeholder="Nombre o parte del nombre">
        <button type="submit">Buscar</button>
    </form>

    <?php if ($term !== ''): ?>
        <h2>Resultados para "<?= htmlspecialchars($term) ?>"</h2>
        <?php if (empty($resultados)): ?>
            <p>No existe tal empleado.</p>
        <?php else: ?>
            <table border="1" cellpadding="6">
                <thead><tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr></thead>
                <tbody>
                <?php foreach ($resultados as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['id']) ?></td>
                        <td><?= htmlspecialchars($r['nombre']) ?></td>
                        <td><?= htmlspecialchars($r['puesto']) ?></td>
                        <td><?= htmlspecialchars(number_format($r['salario'],2,',','.')) ?> €</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>