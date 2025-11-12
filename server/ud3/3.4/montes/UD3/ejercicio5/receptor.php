<?php
// Define el nombre de la cookie y el script de origen
$nombre_cookie = "centro";
$script_origen = "form.php";

// 1. CHEQUEAR LA EXISTENCIA DE LA COOKIE
if (isset($_COOKIE[$nombre_cookie])) {
    // Si la cookie existe, obtenemos su valor
    $valor_cookie = htmlspecialchars($_COOKIE[$nombre_cookie]);

    // Y mostramos el contenido
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5: Receptor de Cookie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow-lg p-4 bg-success text-white">
                <h1 class="card-title">Recepción de Cookie Exitosa 🥳</h1>
                <p class="lead">El valor de la cookie **"<?php echo $nombre_cookie; ?>"** es:</p>
                <div class="p-3 bg-white text-dark rounded">
                    <h2 class="display-4"><?php echo $valor_cookie; ?></h2>
                </div>
                <p class="mt-3">Esta cookie tiene un tiempo de vida restante. Si esperas **más de 1 minuto** desde su creación y refrescas la página, **expirará** y serás redirigido automáticamente.</p>
            </div>
            <div class="mt-4 text-center">
                <a href="<?php echo $script_origen; ?>" class="btn btn-outline-primary">Volver al Formulario</a>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    // 2. SI LA COOKIE NO EXISTE (No creada o Expirada)

    // Redirigir al formulario inicial
    header("Location: $script_origen?expired=true");
    exit(); // Es crucial llamar a exit() después de un header Location
}
?>