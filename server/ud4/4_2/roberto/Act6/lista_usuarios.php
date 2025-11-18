<?php

// Si el usuario no está logueado, check_auth.php lo redirigirá al login.
require_once 'check_auth.php';

// 2. Si llegamos aquí, el usuario está logueado.
require_once 'conexion.php';

// Saludo al usuario
$nombre_usuario = htmlspecialchars($_SESSION['user_name']);

// (El resto es como la Actividad 5: un SELECT * para obtener los usuarios
// y mostrarlos en una tabla HTML con botones de Editar/Eliminar)
// ...
// (Te dejo esta parte para que la adaptes usando Actividad 5 como plantilla)
// ...
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    </head>
<body>
    <h1 style="text-align:center;">Gestor de Usuarios</h1>
    
    <div style="text-align: center; margin: 10px;">
        <p>Hola, <strong><?php echo $nombre_usuario; ?></strong>.</p>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
    
    </body>
</html>