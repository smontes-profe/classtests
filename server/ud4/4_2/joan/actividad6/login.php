<?php
session_start();
require_once 'config.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['nombre_usuario'];
            $_SESSION['id_usuario'] = $usuario['id'];
            header("Location: panel.php");
            exit;
        } else {
            $mensaje = "Credenciales incorrectas.";
        }
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Contraseña:</label><input type="password" name="password" required><br>
    <button type="submit">Entrar</button>
</form>
<p><?= $mensaje ?></p>