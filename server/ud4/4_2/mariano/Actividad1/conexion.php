<?php
require_once 'config.php';
try {
$pdo = new PDO($dsn, DB_USER, DB_PASS);
$pdo->setAttribute(
PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION
);
echo "Funciona" ;
} catch (PDOException $e) {
error_log($e->getMessage());
die("Error de conexión");
}
?>