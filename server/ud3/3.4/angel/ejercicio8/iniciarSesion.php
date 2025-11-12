<?php
// Iniciar la sesión
session_start();

// Guardar un valor en la sesión
$_SESSION['rol'] = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión con Valor</title>
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4 text-center">
            <h1 class="text-primary mb-4">Sesión PHP</h1>
            <p class="lead">ID de la sesión actual: <strong><?php echo session_id(); ?></strong></p>
            <p class="lead">Valor almacenado en $_SESSION['rol']: <strong><?php echo $_SESSION['rol']; ?></strong></p>
            <p class="text-muted mt-3">Refresca la página varias veces y verás que el valor en la sesión se mantiene.</p>
        </div>
    </div>
</body>

</html>