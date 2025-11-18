<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
</head>

<body class="bg-light">
    <header class="py-4 mb-4 bg-white border-bottom">
        <div class="container">
            <h1 class="h3 mb-0"><?= htmlspecialchars($pageTitle) ?></h1>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="alert alert-info" role="alert">
                <?= htmlspecialchars($mensaje) ?>
            </div>
            <p>Recarga la página: el navegador pedirá siempre el contenido al servidor.</p>
        </div>
    </main>

    <footer class="mt-5 py-4 bg-white border-top">
        <div class="container text-center small text-muted">
            &copy; <?= date('Y') ?> Ejercicio 2
        </div>
    </footer>
</body>

</html>
