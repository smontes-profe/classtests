<?php
require_once 'config.php';

function getPDO() {
    global $PDO_OPTIONS;
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
    return new PDO($dsn, DB_USER, DB_PASS, $PDO_OPTIONS);
}

function usuarioAutenticado() {
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login.php");
        exit;
    }
}
?>