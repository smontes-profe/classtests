<?php
// Inicia la sesión y comprueba si existe $_SESSION['rol']

session_start();

// Forzamos cabecera HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificar acceso - Ej10</title>
</head>

<body>
    <main>
        <h1>Verificar acceso (Ejercicio 10)</h1>

        <?php if (isset($_SESSION['rol'])):
            $rol = htmlspecialchars($_SESSION['rol'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        ?>
            <div class="notice">
                <p><strong>Acceso concedido como:</strong> <?php echo $rol; ?></p>
            </div>

            <form action="cerrar_sesion.php" method="post" style="display:inline">
                <button type="submit">Destruir sesión</button>
            </form>

            <p style="margin-top:12px;">
                <a href="../../ejercicio8/php/iniciar_sesion.php">Volver a guardar rol en sesión (Ej8)</a>
                &nbsp;|&nbsp;
                <a href="../html/index.html">Volver a la página del ejercicio</a>
            </p>

        <?php else: ?>

            <div class="notice">
                <p><strong>Acceso denegado.</strong></p>
            </div>

            <form action="../../ejercicio8/php/iniciar_sesion.php" method="get" style="display:inline">
                <button type="submit">login</button>
            </form>

            <p style="margin-top:12px;">
                <a href="../html/index.html">Volver a la página del ejercicio</a>
            </p>

        <?php endif; ?>

    </main>
</body>

</html>