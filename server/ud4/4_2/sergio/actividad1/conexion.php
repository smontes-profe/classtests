<?php

//Cargo el archivo con los datos de la base de datos
require_once 'config.php';

//Conecto con la base de datos
try {
//Creo la conexion PDO
$pdo = new PDO($dsn, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Mensaje para cuando funciona todo
echo "Conexión establecida correctamente.";
} catch (PDOException $e) {
//Si falla se muestra el error
echo "Error en la conexión: " . $e->getMessage();
}