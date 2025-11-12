<?php
// Evitar que la página se almacene en caché
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Fecha de expiración en el pasado

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Sin Caché</title>

    <!-- Bootstrap CSS -->
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm p-5 text-center">
            <h1 class="text-primary mb-3">Esta página nunca se almacenará en caché</h1>
            <p class="lead">Cada vez que la visitas, el navegador solicita el contenido al servidor.</p>
        </div>
    </div>

</body>

</html>