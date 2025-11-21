
<?php
require_once 'funciones.php';

session_start();
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT id, nombre_usuario, password FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            header("Location: lista_usuarios.php");
            exit;
        } else {
            $mensaje = 'Credenciales incorrectas.';
        }
    } catch (PDOException $e) {
        $mensaje = 'Error BD: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
<h2>Iniciar sesión</h2>
<?php if (isset($_GET['registro'])): ?><p style="color:green;">Registro completado, inicia sesión.</p><?php endif; ?>
<?php if ($mensaje): ?><p style="color:red;"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>

<form method="POST" action="">
    Email: <input type="email" name="email" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Entrar">
</form>
<p><a href="registro.php">Registrarme</a></p>
</body>
</html>

