<?php
try {
    // Datos de conexión
    $host = "localhost";
    $port = 3306; // Puerto MySQL por defecto en XAMPP o MAMP
    $dbname = "empresa";
    $user = "root";
    $pass = ""; 

    // DSN (Data Source Name)
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensaje opcional de éxito
    echo "Connected successfully<p>";

} catch (PDOException $e) {
    echo "XXXXX---->> Connection error:<p>" . $e->getMessage();
}
?>
