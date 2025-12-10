<?php
session_start();
$idSession = session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicialización de Sesión (Bootstrap)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <header class="pb-3 mb-4 border-bottom">
            <h1 class="display-5">Inicialización de Sesión 🚀</h1>
        </header>

        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            ID de Sesión Actual
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary mb-0" role="alert">
                                <p class="lead mb-0">El ID de tu sesión es:</p>
                                <pre class="mb-0 text-center fs-5"><?= htmlspecialchars($idSession) ?></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="mt-5 text-center text-muted">
            <p>&copy; <?= date("Y") ?> - Servidor</p>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>