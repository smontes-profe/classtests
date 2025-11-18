<?php
require_once 'config.php';

$nombre = '';
$resultados = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = '%' . trim($_POST['nombre']) . '%';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE nombre LIKE :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>

<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <button type="submit">Buscar</button>
</form>

<?php if (!empty($resultados)): ?>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Puesto</th><th>Salario</th></tr>
    <?php foreach ($resultados as $emp): ?>
    <tr>
        <td><?= $emp['id'] ?></td>
        <td><?= $emp['nombre'] ?></td>
        <td><?= $emp['puesto'] ?></td>
        <td><?= $emp['salario'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
<p>No se encontraron resultados</p>
<?php endif; ?>