<?php
// Comprobamos si la cookie 'centro' existe
if (!isset($_COOKIE['centro'])) {
    // Si no existe o ha expirado, redirigimos al formulario
    header("Location: form.php");
    exit();
}
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
            <p class="lead">La cookie contiene: <strong><?php echo htmlspecialchars($_COOKIE['centro']); ?></strong></p>
            <p class="text-muted">Refresca la página para probar la expiración de 1 minuto.</p>
        </div>
    </div>
</body>

</html>