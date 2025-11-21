<?php
//Cargo la base de datos
require_once __DIR__ . '/../actividad1/config.php';

//Obtengo el ID del empleado
$id = $_GET['id'] ?? null;

//Si no hay ID muestro el error
if (!$id) {
    die("Error: No se especificó el ID del empleado");
}

try {
    //Conecto con la base de datos
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Hago un delete para poder borrar el empleado
    $sql = "DELETE FROM empleados WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    //Ejecuto la consulta con el ID
    $stmt->execute([':id' => $id]);
    
    //Reedirijo otra vez a la lista despues de eliminar
    header("Location: lista.php");
    exit();
    
} catch (PDOException $e) {
    //Muestro error si hay algun error con la base de datos
    die("Error al eliminar empleado: " . $e->getMessage());
}
?>