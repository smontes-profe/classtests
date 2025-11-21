<?php

require_once 'config.php';

$nombre = $_POST['nombre'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE nombre LIKE :nombre");
        $stmt->bindValue(':nombre', "%$nombre%");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<form method="post">
    <label>Buscar empleado por nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
    <button type="submit">Buscar</button>
</form>

<?php if (!empty($resultados)): ?>
    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
        <?php foreach ($resultados as $emp): ?>
            <tr>
                <td><?= $emp['id'] ?></td>
                <td><?= htmlspecialchars($emp['nombre']) ?></td>
                <td><?= htmlspecialchars($emp['puesto']) ?></td>
                <td><?= $emp['salario'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p>No se encontraron resultados.</p>
<?php endif; ?>
