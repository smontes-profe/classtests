<?php
require_once 'config.php';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado ✅<p>";
} catch (PDOException $e) {
    echo "Error ❌: " . $e->getMessage();
}
?>