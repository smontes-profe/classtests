<?php
require_once 'config.php';
require_once 'funciones.php';
include 'header.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: lista_usuarios.php");
        exit;
    } else {
        $mensaje = "❌ Credenciales incorrectas.";
    }
}
?>

<h2>Iniciar sesión</h2>
<form method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Entrar</button>
</form>
<p><?= $mensaje ?></p>
</body></html>
