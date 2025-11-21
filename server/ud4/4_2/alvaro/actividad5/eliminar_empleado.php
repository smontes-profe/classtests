<?php
// Mostramos errores para ayudarnos a depurar
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la config
require_once 'config.php';

// 1. Comprobamos si nos han pasado un ID por la URL (GET)
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    try {
        // 2. Conectamos a la BBDD
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 3. Preparamos la consulta DELETE (¡siempre con WHERE!)
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // 4. Vinculamos el ID (seguridad)
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // 5. Ejecutamos el borrado
        $stmt->execute();

        // 6. Si todo va bien, redirigimos de vuelta a la lista
        header("Location: lista.php");
        exit; // Paramos el script después de redirigir

    } catch (PDOException $e) {
        // Si algo falla, mostramos el error.
        // 'die()' para el script y muestra el mensaje
        die("Error al eliminar el empleado: " . $e->getMessage());
    }
} else {
    // Si alguien entra a este archivo sin un ID, lo devolvemos a la lista
    header("Location: lista.php");
    exit;
}
