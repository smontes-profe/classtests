<?php

if (!isset($_COOKIE['sesion_user'])) {
    header("Location: form.php");
    exit();
}

$expiracionPasada = time() - 3600;
setcookie('sesion_user', '', $expiracionPasada, '/', '', true, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptor (Bootstrap)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">

        <header class="pb-3 mb-4 border-bottom">
            <h1 class="display-5">Cookie Registrada 🍪</h1>
        </header>

        <main>
            <div class="card shadow-sm">
                <div class="card-header">
                    Datos recibidos en <code>$_COOKIE</code>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-0" role="alert">
                        <p>Se ha recibido la cookie. Se muestra abajo y se ha programado su eliminación (ya no estará en la próxima solicitud).</p>
                        <pre class="mb-0"><?= htmlspecialchars(print_r($_COOKIE, true)) ?></pre>
                    </div>
                </div>
            </div>
            <a href="form.php" class="btn btn-secondary mt-3">Volver al formulario</a>
        </main>

        <footer class="mt-4 text-center text-muted">
            <p>&copy; <?= date("Y") ?> Página Receptora</p>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>