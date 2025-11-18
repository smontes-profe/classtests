<?php
require_once 'conexion.php';
$pdo = getPDO();

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre_usuario === '') $errors[] = "El nombre de usuario es obligatorio";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email no válido";
    if (strlen($password) < 6) $errors[] = "La contraseña debe tener mínimo 6 caracteres";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $errors[] = "El email ya está en uso";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuarios (nombre_usuario, email, password) 
                        VALUES (:nombre_usuario, :email, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':nombre_usuario', $nombre_usuario);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $hash);
                $stmt->execute();

                $success = "Usuario creado correctamente. ID: " . $pdo->lastInsertId();
                $nombre_usuario = $email = '';
            }
        } catch (PDOException $e) {
            $errors[] = "Error al insertar usuario: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Nuevo usuario</title></head>
<body>
    <h1>Registrar nuevo usuario</h1>

    <?php if ($success): ?>
        <p style="color:green"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if ($errors): ?>
        <ul style="color:red">
            <?php foreach ($errors as $err) echo "<li>" . htmlspecialchars($err) . "</li>"; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="">
        <div>
            <label>Nombre de usuario:<br>
                <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($nombre_usuario ?? '') ?>">
            </label>
        </div>
        <div>
            <label>Email:<br>
                <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
            </label>
        </div>
        <div>
            <label>Contraseña:<br>
                <input type="password" name="password">
            </label>
        </div>
        <button type="submit">Crear usuario</button>
    </form>
</body>
</html>