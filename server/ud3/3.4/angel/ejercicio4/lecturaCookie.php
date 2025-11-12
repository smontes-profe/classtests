<?php
// Crear cookie 'centro' con valor 'Ilerna' que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura de Cookie</title>
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="text-primary text-center mb-4">Lectura de la Cookie</h1>

            <h2 class="h4 text-secondary">Contenido de $_COOKIE:</h2>
            <pre class="bg-dark text-white p-3 rounded"><?php var_dump($_COOKIE); ?></pre>

            <h2 class="h4 text-secondary mt-4">Valor de la cookie "centro":</h2>
            <p class="lead">
                <?php
                if (isset($_COOKIE['centro'])) {
                    echo htmlspecialchars($_COOKIE['centro']);
                } else {
                    echo "La cookie 'centro' todavía no está disponible o ha expirado.";
                }
                ?>
            </p>

            <p class="text-muted mt-3">Refresca la página varias veces para ver cómo aparece y desaparece la cookie después de 30 segundos.</p>
        </div>
    </div>
</body>

</html>