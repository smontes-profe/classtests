<?php
require_once "../actividad1/config.php";
session_start();

// Comprobar sesión activa
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error al eliminar usuario: " . $e->getMessage();
        exit;
    }
}

// Volver al listado tras eliminar
header("Location: usuarios.php");
exit;
