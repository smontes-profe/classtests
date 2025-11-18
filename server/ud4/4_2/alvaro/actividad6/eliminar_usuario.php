<?php
// Definimos el título (aunque el usuario no lo verá)
$titulo_pagina = 'Eliminar Usuario';

// ¡IMPORTANTE! Le decimos al header que esta página es privada
$pagina_privada = true;

// Incluimos la cabecera (que comprueba si la sesión está iniciada)
require_once 'includes/header.php';

// --- LÓGICA DE ELIMINACIÓN ---

// 1. Comprobamos si nos han pasado un ID por la URL
if (!isset($_GET['id'])) {
    // Si no hay ID, no hay nada que borrar. Lo mandamos al dashboard.
    header('Location: dashboard.php');
    exit; // Paramos el script
}

$id = $_GET['id'];

// 2. ¡Medida de Seguridad! Comprobamos que el usuario no intente borrarse a sí mismo
if ($id == $_SESSION['usuario_id']) {
    // Si el ID a borrar es el mismo que el de la sesión, lo mandamos de vuelta
    header('Location: dashboard.php?error=auto_eliminar');
    exit; // Paramos el script
}

// 3. Si todo está bien, intentamos borrar
try {
    // Conectamos a la BBDD
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 4. Preparamos la consulta DELETE (¡siempre con WHERE!)
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // 5. Ejecutamos el borrado, pasando el ID en un array
    $stmt->execute([':id' => $id]);

    // 6. Si todo va bien, redirigimos de vuelta al listado
    header("Location: dashboard.php");
    exit;
} catch (PDOException $e) {
    // Si algo falla (ej: el ID no existe), mostramos un error
    die("Error al eliminar el usuario: " . $e->getMessage());
}
