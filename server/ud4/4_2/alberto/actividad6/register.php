<?php
session_start();                  // inicio sesión
require_once __DIR__ . '/../actividad1/conexion.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user  = $_POST['user'] ?? null;
    $email = $_POST['email'] ?? null;
    $pass  = $_POST['pass'] ?? null;

    if($user && $email && $pass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        try{
            $st = $pdo->prepare(
                "INSERT INTO usuarios (nombre_usuario,email,password)
                 VALUES (?,?,?)"
            );
            $st->execute([$user,$email,$hash]);

            // iniciar sesión automáticamente
            $_SESSION['user'] = $user;

            header("Location: usuario.php");
            exit;

        } catch(PDOException $e){
            if($e->errorInfo[1] == 1062){
                echo "<p style='color:red'>Ese email ya existe.</p>";
            } else {
                echo "<p style='color:red'>Error al registrar.</p>";
            }
        }
    } else {
        echo "<p style='color:red'>faltan datos</p>";
    }
}
?>

<h2>Registro</h2>

<form method="post">
    <input name="user" placeholder="usuario" required>
    <input name="email" placeholder="email" type="email" required>
    <input name="pass" placeholder="password" type="password" required>
    <button type="submit">crear</button>
</form>
