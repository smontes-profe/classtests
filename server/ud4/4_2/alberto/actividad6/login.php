<?php
session_start();
require_once __DIR__ . '/../actividad1/conexion.php';

if($_POST){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // buscar por nombre_usuario
    $st = $pdo->prepare("SELECT * FROM usuarios WHERE nombre_usuario=?");
    $st->execute([$user]);
    $r = $st->fetch();

    if($r && password_verify($pass, $r['password'])){
        $_SESSION['user'] = $r['nombre_usuario'];
        header("Location: usuario.php");   
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>
<h2>Login</h2>

<?php if(isset($error)): ?>
<p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <input name="user" placeholder="usuario" required>
    <input name="pass" type="password" placeholder="password" required>
    <button>entrar</button>
</form>
