<?php
session_start();

// si ya hay sesión, vamos a usuario.php
if(isset($_SESSION['user'])){
    header("Location: usuario.php");
    exit;
}
?>
<h2>Gestor de Usuarios Seguros</h2>

<a href="register.php">Registrar usuario</a><br>
<a href="login.php">Login</a><br>
