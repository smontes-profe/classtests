<?php
require_once __DIR__ . '/../actividad1/conexion.php';

$id = $_GET['id'] ?? null;
if(!$id) die("sin id");

$st = $pdo->prepare("SELECT nombre_usuario,email FROM usuarios WHERE id=?");
$st->execute([$id]);
$u = $st->fetch();

if($_POST){
    $user  = $_POST['user'];
    $email = $_POST['email'];

    $up = $pdo->prepare("UPDATE usuarios SET nombre_usuario=?, email=? WHERE id=?");
    $up->execute([$user,$email,$id]);
    header("Location: usuarios_lista.php"); exit;
}
?>
<h2>Editar usuario</h2>

<form method="post">
    <input name="user"  value="<?= htmlspecialchars($u['nombre_usuario']) ?>">
    <input name="email" value="<?= htmlspecialchars($u['email']) ?>">
    <button>guardar</button>
</form>
