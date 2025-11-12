<?php
// Inicia la sesión y guarda $_SESSION['rol'] = 'Administrador'.
//TODO session_start() debe ejecutarse antes de cualquier salida.

session_start();

// Guardamos el rol en la sesión
$_SESSION['rol'] = 'Administrador';

// Forzamos cabecera HTML
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión y guardar rol - Ej8</title>
</head>

<body>
    <main>
        <h1>Sesión y rol guardado</h1>

        <p><strong>ID de sesión:</strong></p>
        <pre><?php echo session_id(); ?></pre>

        <p><strong>rol guardado en <code>$_SESSION</code>:</strong>
            <?php echo htmlspecialchars($_SESSION['rol'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>
        </p>

        <p>Comprobaciones útiles:</p>
        <ul>
            <li>Abre las DevTools → Application → Cookies para ver la cookie de sesión.</li>
            <li>Ahora ve a <a href="../../ejercicio9/php/verificar_acceso.php">verificar_acceso.php (Ej9)</a> para comprobar el acceso.</li>
        </ul>

        <p>
            <a href="../html/index.html">Volver</a> |
            <a href="../../ejercicio9/php/verificar_acceso.php">Ir a verificar_acceso.php (Ej9)</a>
        </p>
    </main>
</body>

</html>