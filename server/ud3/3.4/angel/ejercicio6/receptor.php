<?php
// Comprobamos si la cookie 'centro' existe
if (!isset($_COOKIE['centro'])) {
    // Si no existe, redirigimos al formulario
    header("Location: form.php");
    exit();
}

// Guardamos el valor antes de borrar
$valorCentro = $_COOKIE['centro'];

// Borrar la cookie estableciendo un tiempo de expiración en el pasado
setcookie("centro", "", time() - 3600); // 1 hora atrás
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptor de Cookie</title>
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4 text-center">
            <h1 class="text-primary mb-4">Valor de la cookie 'centro'</h1>
            <p class="lead">La cookie contenía: <strong><?php echo htmlspecialchars($valorCentro); ?></strong></p>
            <p class="text-muted">La cookie ha sido eliminada. Si refrescas la página, serás redirigido al formulario.</p>
        </div>
    </div>
</body>

</html>