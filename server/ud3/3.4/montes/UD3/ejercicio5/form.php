<?php
//! Definir el nombre de la cookie y el script de destino
$nombre_cookie = "centro";
$script_destino = "receptor.php";

// 1. CHEQUEO Y PROCESAMIENTO DE DATOS POR GET
if (isset($_GET[$nombre_cookie])) {
    // Si se recibe el campo 'centro' por GET:

    $valor_recibido = $_GET[$nombre_cookie];
    $expiracion = time() + 60; // 1 minuto (60 segundos)

    // Almacenar el valor en la COOKIE y establecer la expiración
    // El path "/" asegura que la cookie esté disponible para receptor.php
    setcookie($nombre_cookie, $valor_recibido, $expiracion, "/");

    // Redirigir a receptor.php
    header("Location: $script_destino");
    exit(); // Es crucial llamar a exit() después de un header Location
    //! 2. MOSTRAR EL FORMULARIO (Si no hay datos GET para procesar)
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5: Formulario de Cookie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="card-title text-primary">Formulario de Escritura de Cookie</h1>
            <p class="lead">Introduce el nuevo valor para la cookie **"centro"**.</p>
            
            <form action="form.php" method="GET">
                <div class="mb-3">
                    <label for="centroInput" class="form-label">Valor para la cookie "centro":</label>
                    <input type="text" class="form-control" id="centroInput" name="<?php echo $nombre_cookie; ?>" required>
                    <div class="form-text">La cookie expirará en 1 minuto.</div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar y Redirigir a Receptor</button>
            </form>

            <h5 class="mt-4">Instrucciones:</h5>
            <ol>
                <li>Introduce un valor y pulsa el botón. Serás redirigido a `receptor.php`.</li>
                <li>`receptor.php` mostrará el valor de la cookie recién creada.</li>
                <li>Una vez en `receptor.php`, espera **más de 1 minuto** y refresca la página. Deberías ser **redirigido** de vuelta a este formulario.</li>
            </ol>
        </div>
    </div>
</body>
</html>