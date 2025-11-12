<?php
// Inicia la sesión y comprueba si existe $_SESSION['rol']

// start the session BEFORE any output
session_start();

// Force HTML content-type header
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificar acceso - Ej9</title>
</head>

<body>
    <main>
        <h1>Verificar acceso (Ejercicio 9)</h1>

        <?php
        if (isset($_SESSION['rol'])):
            // Usuario 'logueado' (simulado)
            $rol = htmlspecialchars($_SESSION['rol'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        ?>
            <div class="notice">
                <p><strong>Acceso concedido como:</strong> <?php echo $rol; ?></p>
            </div>

            <p>
                <a href="../../ejercicio8/php/iniciar_sesion.php">Volver a guardar rol en sesión (Ej8)</a>
                &nbsp;|&nbsp;
                <a href="../html/index.html">Volver a la página del ejercicio</a>
            </p>

        <?php
        else:
            // No está logado -> mostrar botón login que lleva a iniciar_sesion.php
        ?>
            <div class="notice">
                <p><strong>Acceso denegado.</strong></p>
            </div>

            <form action="../../ejercicio8/php/iniciar_sesion.php" method="get" style="display:inline">
                <button type="submit">login</button>
            </form>

            <p style="margin-top:12px;">
                <a href="../html/index.html">Volver a la página del ejercicio</a>
            </p>
        <?php
        endif;
        ?>

    </main>
</body>

</html>