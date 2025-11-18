<?php
require_once 'config.php';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto'];
    $salario = $_POST['salario'];

    try {
        $stmt = $pdo->prepare("UPDATE empleados SET nombre = :nombre, puesto = :puesto, salario = :salario WHERE id = :id");
        $stmt->execute([
            ':nombre' => $nombre,
            ':puesto' => $puesto,
            ':salario' => $salario,
            ':id' => $id
        ]);
        $mensaje = " Datos actualizados.";
    } catch (PDOException $e) {
        $mensaje = " Error: " . $e->getMessage();
    }
}

$stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = :id");
$stmt->execute([':id' => $id]);
$emp = $stmt->fetch();
?>

<form method="POST">
    <label>Nombre:</label><input type="text" name="nombre" value="<?= htmlspecialchars($emp['nombre']) ?>"><br>
    <label>Puesto:</label><input type="text" name="puesto" value="<?= htmlspecialchars($emp['puesto']) ?>"><br>
    <label>Salario:</label><input type="number" step="0.01" name="salario" value="<?= htmlspecialchars($emp['salario']) ?>"><br>
    <button type="submit">Aceptar</button>
</form>
<p><?= $mensaje ?></p>