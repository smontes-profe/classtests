
<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../sesion_usuarios.php';
require_once __DIR__ . '/../sesion2_empleados.php';

auth_require();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) { header('Location: /usuarios/listar.php'); exit; }

try {
    $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $del = $pdo->prepare("DELETE FROM usuarios WHERE id=:id");
    $del->execute([':id'=>$id]);
    flash_set('ok', 'Usuario eliminado');
} catch (PDOException $e) {
    flash_set('error', 'No se pudo eliminar el usuario');
}
header('Location: /usuarios/listar.php'); exit;


