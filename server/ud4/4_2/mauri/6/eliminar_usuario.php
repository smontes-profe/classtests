<?php

// Config y sesión
require_once __DIR__ . '/../1/config.php';
session_start();

// Protección: solo usuarios autenticados
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// ID del usuario a eliminar
$id = $_GET['id'] ?? null;
if (!$id) {
    $_SESSION['error'] = 'No se especificó el usuario a eliminar.';
    header('Location: usuarios.php');
    exit;
}

// Seguridad: evitar autodestrucción de la sesión actual
if ($id == $_SESSION['user_id']) {
    $_SESSION['error'] = 'No puedes eliminar tu propio usuario.';
    header('Location: usuarios.php');
    exit;
}

// Borrar usuario si existe
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comprobar existencia
    $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $usuario = $stmt->fetch();
    if (!$usuario) {
        $_SESSION['error'] = 'El usuario no existe.';
        header('Location: usuarios.php');
        exit;
    }

    // Ejecutar borrado
    $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);

    // Mensaje de éxito y redirección
    $_SESSION['success'] = 'Usuario eliminado correctamente.';
    header('Location: usuarios.php');
    exit;

} catch (PDOException $e) {
    die('Error al eliminar usuario: ' . $e->getMessage());
}