<?php
session_start();
require_once __DIR__ . '/../actividad1/conexion.php';

// proteger la página
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

// logout
if(isset($_GET['action']) && $_GET['action'] === 'logout'){
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<h2>Hola, <?= htmlspecialchars($_SESSION['user']) ?></h2>

<nav>
    <a href="usuarios_lista.php">Ver usuarios</a> |
    <a href="usuario.php?action=logout">Logout</a>
</nav>
