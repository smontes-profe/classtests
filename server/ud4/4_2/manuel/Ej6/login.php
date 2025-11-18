<?php
session_start();
require_once 'conexion.php';
$pdo = getPDO();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email no válido.";
    if ($password === '') $errors[] = "Se necesita contraseña";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT id, nombre_usuario, password FROM usuarios WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nombre_usuario'];
                header("Location: usuarios.php");
                exit;
            } else {
                $errors[] = "Valores no válidos";
            }
        } catch (PDOException $e) {
            $errors[] = "Error: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
    <h1>Login</h1>
    <?php if ($errors): ?><ul style="color:red"><?php foreach ($errors as $er) echo "<li>" . htmlspecialchars($er) . "</li>"; ?></ul><?php endif; ?>
    <form method="post" action="">
        <div><label>Email:<br><input type="email" name="email"></label></div>
        <div><label>Contraseña:<br><input type="password" name="password"></label></div>
        <button type="submit">Entrar</button>
    </form>
    <p><a href="nuevo_usuario.php">Registrar nuevo usuario</a></p>
</body>
</html>