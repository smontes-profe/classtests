<?php

require_once 'config.php';
$id = $_GET['id'] ?? null;

if (!$id) die("ID no válido.");

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $puesto = $_POST['puesto'];
        $salario = $_POST['salario'];

        $stmt = $pdo->prepare("UPDATE empleados SET nombre=:nombre, puesto=:puesto, salario=:salario WHERE id=:id");
        $stmt->execute([':nombre'=>$nombre, ':puesto'=>$puesto, ':salario'=>$salario, ':id'=>$id]);
        echo "<p>✅ Datos actualizados correctamente.</p>";
    }

    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id=:id");
    $stmt->execute([':id'=>$id]);
    $emp = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>

<form method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($emp['nombre']) ?>"><br>
    <label>Puesto:</label>
    <input type="text" name="puesto" value="<?= htmlspecialchars($emp['puesto']) ?>"><br>
    <label>Salario:</label>
    <input type="number" step="0.01" name="salario" value="<?= $emp['salario'] ?>"><br>
    <button type="submit">Actualizar</button>
</form>
