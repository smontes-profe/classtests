<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Acceso</title>
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4 text-center">
            <h1 class="text-primary mb-4">Verificación de Acceso</h1>
            <?php
            if (isset($_SESSION['rol'])) {
                echo "<p class='lead'>Acceso concedido como: <strong>" . htmlspecialchars($_SESSION['rol']) . "</strong></p>";
            } else {
                echo "<p class='lead text-danger'>Acceso denegado</p>";
                echo '<form action="iniciarSesion.php" method="get" class="mt-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </form>';
            }
            ?>
        </div>
    </div>
</body>

</html>