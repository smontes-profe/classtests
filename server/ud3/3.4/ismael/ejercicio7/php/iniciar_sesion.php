<?php
// Inicia la sesión y muestra el ID de sesión.
//TODO session_start() debe ejecutarse antes de cualquier salida.

session_start();

// Cabecera HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Iniciar sesión - Ej7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <main>
        <h1>Sesión iniciada</h1>

        <p><strong>ID de sesión actual:</strong></p>
        <pre><?php echo session_id(); ?></pre>

        <p>Información adicional:</p>
        <ul>
            <li><strong>Nombre de la sesión:</strong> <?php echo session_name(); ?></li>
            <li><strong>Cookie de sesión:</strong>
                <?php
                if (ini_get('session.use_cookies')) {
                    $params = session_get_cookie_params();
                    echo 'Existe. Path=' . htmlspecialchars($params['path'])
                        . ' | Lifetime=' . htmlspecialchars($params['lifetime']);
                } else {
                    echo 'No se usa cookie para la sesión.';
                }
                ?>
            </li>
        </ul>

        <p>Recarga la página varias veces: verás que el ID permanece mientras la sesión exista.</p>

        <p>
            <a href="../html/index.html">Volver</a> |
            <a href="../../ejercicio8/php/iniciar_sesion.php">Ir a Ejercicio 8 (guardar rol en sesión)</a>
        </p>
    </main>
</body>

</html>