<?php
try {
    // Datos de conexión
    $host = "localhost";
    $port = 3306; // Puerto MySQL en MAMP
    $dbname = "apitests";
    $user = "root"; //"sergio";
    $pass = "root"; //"ser";
    // DSN (Data Source Name)
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);
    // $pdo = new PDO('mysql:host=localhost;port=3306;dbname=apitests', 'sergio', 'ser');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Connected succesfully<p>";
} catch (PDOException $e) {
    echo "XXXXX---->> Connection error: <p>" . $e->getMessage();
}
?>