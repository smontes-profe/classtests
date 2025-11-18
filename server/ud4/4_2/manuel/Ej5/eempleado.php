<?php
require_once 'conexion.php';
$pdo = getPDO();

$id = $_GET['id'] ?? null;
$nombre = $puesto = $salario = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPost = $_POST['id'] ?? null;
    $nombre = trim($_POST['nombre'] ?? '');
    $puesto = trim($_POST['puesto'] ?? '');
    $salario = str_replace(',', '.', $_POST['salario'] ?? '0');

    if ($nombre === '') $errors[] = "Se necesita el nombre";
    if (!is_numeric($salario)) $errors[] = "Salario inválido";

    if (empty($errors)) {
        try {
            if ($idPost) {
                $sql = "UPDATE empleados SET nombre = :nombre, puesto = :puesto, salario = :salario WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nombre' => $nombre,
                    ':puesto' => $puesto,
                    ':salario' => $salario,
                    ':id' => $idPost
                ]);
                $success = "Empleado actualizado";
                $id = $idPost;
            } else {
                $sql = "INSERT INTO empleados (nombre, puesto, salario) VALUES (:nombre, :puesto, :salario)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nombre' => $nombre,
                    ':puesto' => $puesto,
                    ':salario' => $salario
                ]);
                $success = "Empleado creado. ID: " . $pdo->lastInsertId();
                $nombre = $puesto = $salario = '';
            }
        } catch (PDOException $e) {
            $errors[] = "Error en la operación: " . htmlspecialchars($e->getMessage());
        }
    }
}

if ($id && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    try {
        $stmt = $pdo->prepare("SELECT id, nombre, puesto, salario FROM empleados WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $emp = $stmt->fetch();
        if ($emp) {
            $nombre = $emp['nombre'];
            $puesto = $emp['puesto'];
            $salario = $emp['salario'];
        } else {
            die("Empleado no encontrado.");
        }
    } catch (PDOException $e) {
        die("Error: " . htmlspecialchars($e->getMessage()));
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title><?= $id ? 'Editar' : 'Crear' ?> empleado</title></head>
<body>
    <h1><?= $id ? 'Editar' : 'Crear' ?> empleado</h1>

    <?php if ($success): ?><p style="color:green"><?= htmlspecialchars($success) ?></p><?php endif; ?>
    <?php if ($errors): ?><ul style="color:red"><?php foreach ($errors as $er) echo "<li>" . htmlspecialchars($er) . "</li>"; ?></ul><?php endif; ?>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id ?? '') ?>">
        <div>
            <label>Nombre:<br><input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>"></label>
        </div>
        <div>
            <label>Puesto:<br><input type="text" name="puesto" value="<?= htmlspecialchars($puesto) ?>"></label>
        </div>
        <div>
            <label>Salario:<br><input type="text" name="salario" value="<?= htmlspecialchars($salario) ?>"></label>
        </div>
        <button type="submit">Aceptar</button>
    </form>

    <p><a href="lista.php">Volver a lista</a></p>
</body>
</html>