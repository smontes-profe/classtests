<?php
require_once 'config.php';

function getPDO(): PDO {
    global $dsn;
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Conexión establecida";
        return $pdo;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        die("Error de conexión");
    }
}
getPDO();