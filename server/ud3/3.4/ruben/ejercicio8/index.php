
<?php


// Iniciar la sesión
session_start();

// Guardar el valor "Administrador" en la clave "rol"
$_SESSION['rol'] = "Administrador";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión PHP</title>
</head>
<body>
    <h1>Guardar Valor en Sesión</h1>
    
    <p>Valor guardado en la sesión:</p>
    <p><strong>Rol:</strong> <?php echo $_SESSION['rol']; ?></p>
    
    <p>ID de sesión: <?php echo session_id(); ?></p>
</body>
</html>