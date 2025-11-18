<?php
// Define el nombre de la cookie y el script de origen
$nombre_cookie = "centro";
$script_origen = "form.php";

// 1. CHEQUEAR LA EXISTENCIA DE LA COOKIE
if (isset($_COOKIE[$nombre_cookie])) {
    // Si la cookie existe:
    $valor_cookie = htmlspecialchars($_COOKIE[$nombre_cookie]);

    // 2. ELIMINAR LA COOKIE
    // Para eliminar la cookie en el navegador, se llama a setcookie()
    // con el mismo nombre y path, y se establece un tiempo de expiración en el pasado.
    setcookie($nombre_cookie, "", time() - 3600, "/");

    // 3. Mostrar el contenido de la cookie ANTES de que el navegador la borre
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5: Receptor de Cookie - Eliminación</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow-lg p-4 bg-warning">
                <h1 class="card-title text-dark">Cookie Leída y Marcada para Eliminación 🗑️</h1>
                <p class="lead text-dark">El valor de la cookie **"<?php echo $nombre_cookie; ?>"** ha sido leído:</p>
                <div class="p-3 bg-white text-dark rounded">
                    <h2 class="display-4"><?php echo $valor_cookie; ?></h2>
                </div>
                <p class="mt-3 text-dark">
                    **Acción Realizada:** Se ha enviado la orden de **borrar** esta cookie al navegador.
                    <br>
                    **Al refrescar esta página,** la cookie ya no existirá, y serás **redirigido** a `form.php`.
                </p>
            </div>
            <div class="mt-4 text-center">
                <a href="<?php echo $script_origen; ?>" class="btn btn-outline-primary">Volver al Formulario</a>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    // 4. SI LA COOKIE NO EXISTE (No creada, expirada o borrada en la petición anterior)

    // Redirigir al formulario inicial
    header("Location: $script_origen?deleted=true");
    exit(); // Es crucial llamar a exit() después de un header Location
}
?>