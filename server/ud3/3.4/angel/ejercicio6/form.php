<?php
// Comprobamos si se recibe el campo 'centro' por GET
if (!empty($_GET['centro'])) {
    // Guardamos el valor en la cookie 'centro', que expira en 1 minuto
    setcookie("centro", $_GET['centro'], time() + 60);

    // Redirigimos a receptor.php
    header("Location: receptor.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Centro</title>
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="text-primary text-center mb-4">Formulario de Centro</h1>

            <form method="get" action="" class="mx-auto" style="max-width: 400px;">
                <div class="mb-3">
                    <label for="centro" class="form-label">Introduce el centro:</label>
                    <input type="text" name="centro" id="centro" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>