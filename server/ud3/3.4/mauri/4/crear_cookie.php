<?php
// crear_cookie.php
// Soporta: ?action=create&ttl=30  -> crea la cookie y redirige para que la siguiente petición la lea
// Si se accede sin 'action=create', muestra var_dump($_COOKIE) y el valor de 'centro'

$default_ttl = 30;
$action = isset($_GET['action']) ? $_GET['action'] : null;
$ttl = isset($_GET['ttl']) && is_numeric($_GET['ttl']) ? (int)$_GET['ttl'] : $default_ttl;

if ($action === 'create') {
    // crear la cookie 'centro' con valor 'Ilerna'
    setcookie('centro', 'Ilerna', time() + $ttl, '/');
    // Redirigir a la misma página sin action para forzar una nueva petición donde el navegador envía la cookie
    header('Location: crear_cookie.php');
    exit;
}

// A partir de aquí, se muestra el resultado (var_dump de $_COOKIE y valor de 'centro')
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer Cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Leer Cookie</h1>

        <p>Salida de <code>$_COOKIE</code> (comprueba si la cookie 'centro' está presente):</p>

        <div class="dump">
            <pre><?php var_dump($_COOKIE); ?></pre>
        </div>

        <div class="result">
            <?php if (isset($_COOKIE['centro'])): ?>
                <p class="ok">Valor de la cookie "centro": <strong><?php echo htmlspecialchars($_COOKIE['centro']); ?></strong></p>
            <?php else: ?>
                <p class="missing">La cookie "centro" no está presente en esta petición.</p>
            <?php endif; ?>
        </div>

        <div class="actions">
            <a class="button" href="crear_cookie.php?action=create&ttl=30">Crear cookie (30s)</a>
            <a class="button secondary" href="index.html">Volver</a>
        </div>

        <div class="note">
            Refresca la página varias veces para observar el comportamiento: después de crear, la siguiente petición debe incluir la cookie creada.
            Abre la consola del navegador (Network / Application -> Cookies) para ver el valor y la fecha de expiración.
        </div>
    </div>
</body>
</html>
