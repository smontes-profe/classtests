<?php

//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';
session_start();

//Verifico si el usuario esta autentificado, si no lo esta lo mando al login
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

//Obtengo el ID del usuario que quiero eliminar
$id = $_GET['id'] ?? null;

//Verifico que se ha dado un ID
if (!$id) {
    $_SESSION['error'] = 'No se especificó el usuario a eliminar.';
    header('Location: users.php');
    exit;
}

//Evito que un usuario se pueda eliminar a si mismo
if ($id == $_SESSION['user_id']) {
    $_SESSION['error'] = 'No puedes eliminar tu propio usuario.';
    header('Location: users.php');
    exit;
}

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Verifico que el usuario existe antes de borrarlo
    $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $usuario = $stmt->fetch();

    //Si no encuentra el usuario muestro el error
    if (!$usuario) {
        $_SESSION['error'] = 'El usuario no existe.';
        header('Location: users.php');
        exit;
    }

    //Elimino al usuario de la base de datos
    $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);

    //Muestro un mensaje de que todo ha salido bien y se mostrara en users.php
    $_SESSION['success'] = 'Usuario eliminado correctamente.';
    header('Location: users.php');
    exit;

} catch (PDOException $e) {
    //Muestro error si hay algun error con la base de datos
    die('Error al eliminar usuario: ' . $e->getMessage());
}