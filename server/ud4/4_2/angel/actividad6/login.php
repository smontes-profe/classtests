<?php
require_once "../actividad1/config.php";
session_start();

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = "Rellena email y contraseña.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT id, nombre_usuario, email, password FROM usuarios WHERE email = :email LIMIT 1");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Login correcto: guardar datos en sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nombre_usuario'];
                header('Location: usuarios.php');
                exit;
            } else {
                $error = "Email o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            $error = "Error en la consulta: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>"><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Entrar">
    </form>

    <p><a href="register.php">Crear cuenta</a></p>
</body>

</html>