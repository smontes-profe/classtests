<?php
session_start();

$showLoginButton = false;

if (isset($_SESSION['rol'])) {
    $message = "Acceso concedido como: <strong>" . htmlspecialchars($_SESSION['rol']) . "</strong>";
    $alertClass = "alert-success";
} else {
    $message = "Acceso denegado";
    $alertClass = "alert-danger";
    $showLoginButton = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <header class="pb-3 mb-4 border-bottom">
            <h1 class="display-5">Verificación de Acceso 🛡️</h1>
        </header>

        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Estado del Acceso
                        </div>
                        <div class="card-body">
                            <div class="alert <?= $alertClass ?> mb-0" role="alert">
                                <p class="lead text-center mb-0">
                                    <?= $message ?>
                                </p>
                            </div>

                            <?php if ($showLoginButton): // Si está DESCONECTADO ?>
                                <div class="text-center mt-4 d-grid">
                                    <a href="iniciar_sesion.php" class="btn btn-primary">
                                        Login
                                    </a>
                                </div>
                            <?php else: // Si está CONECTADO ?>
                                <div class="mt-4">
                                    <div class="d-grid gap-2">
                                        <a href="cerrar_sesion.php" class="btn btn-danger">
                                            Destruir sesión
                                        </a>
                                        <a href="iniciar_sesion.php" class="btn btn-secondary">
                                            Volver (Refrescar sesión)
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>

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