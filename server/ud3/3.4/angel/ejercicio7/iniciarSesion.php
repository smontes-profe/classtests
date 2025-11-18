<?php
// Iniciar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicialización de Sesión</title>
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4 text-center">
            <h1 class="text-primary mb-4">Sesión PHP</h1>
            <p class="lead">ID de la sesión actual: <strong><?php echo session_id(); ?></strong></p>
            <p class="text-muted">Refresca la página varias veces y verás que el ID de la sesión permanece igual mientras la sesión siga activa.</p>
        </div>
    </div>
</body>

</html>