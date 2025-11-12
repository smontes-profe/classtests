<?php
// === PARTE 1: CREACIÓN DE LA COOKIE (del Ejercicio 3) ===
$nombre_cookie = "centro";
$valor_cookie = "Ilerna";
$expiracion = time() + 30; // 30 segundos

// setcookie() debe llamarse antes de cualquier salida HTML
setcookie($nombre_cookie, $valor_cookie, $expiracion, "/");

// === PARTE 2: LECTURA DE LA COOKIE (del Ejercicio 4) ===
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4: Lectura de Cookie con Bootstrap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="estilos.css">
</head>
<body class="bg-light">
    <div class="container mt-5">

        <header class="mb-4 p-3 bg-primary text-white rounded shadow">
            <h1 class="display-5">4. Creación y Lectura de Cookie 🍪</h1>
        </header>

        <p class="lead"><strong>Recuerda:</strong> La cookie se establece en esta petición y se lee en las peticiones subsiguientes. <strong>¡Refresca la página para ver los resultados!</strong></p>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <h2>Contenido de $_COOKIE (Lectura)</h2>
            </div>
            <div class="card-body">
                <p>Muestra todas las cookies enviadas por el navegador en esta petición:</p>
                <pre class="cookie-dump"><?php var_dump($_COOKIE); ?></pre>
            </div>
        </div>
        
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h2>Valor de la cookie "<?php echo $nombre_cookie; ?>"</h2>
            </div>
            <div class="card-body">
                <?php if (isset($_COOKIE[$nombre_cookie])): ?>
                    <p>El valor de la cookie '<?php echo $nombre_cookie; ?>' es: <span class="valor-cookie"><?php echo htmlspecialchars($_COOKIE[$nombre_cookie]); ?></span></p>
                    <div class="alert alert-success" role="alert">
                        <strong>¡Éxito!</strong> La cookie ha sido leída correctamente.
                    </div>
                <?php else: ?>
                    <p class="text-danger">La cookie '<?php echo $nombre_cookie; ?>' **no está establecida o aún no está disponible**. Refresca la página o ya ha expirado.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4>Instrucciones de Verificación</h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Primera carga:</strong> El `var_dump` estará vacío o no contendrá `"centro"`.</li>
                <li class="list-group-item"><strong>Verificación en Consola (F12):</strong> Busca la cookie `centro` en la pestaña **Aplicación** para ver su valor y la expiración de **30 segundos**.</li>
                <li class="list-group-item"><strong>Refrescar:</strong> Dentro de los 30 segundos, refresca (F5). El script leerá el valor: <strong class="text-success">Ilerna</strong>.</li>
                <li class="list-group-item"><strong>Expiración:</strong> Espera más de 30 segundos y refresca. La cookie **desaparecerá** y el mensaje de error aparecerá de nuevo.</li>
            </ul>
        </div>
        
        <footer class="mt-5 text-center text-muted">
            <p>Usando PHP y Bootstrap 5.</p>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>