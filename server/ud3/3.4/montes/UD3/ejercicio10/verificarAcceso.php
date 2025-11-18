<?php
// ¡Fundamental! Iniciar la sesión para acceder a los datos guardados
session_start();

// Scripts necesarios
$script_login = "guardarSesion.php"; 
// CORRECCIÓN AQUÍ: Usamos el nombre 'cerrarSesion.php'
$script_logout = "cerrarSesion.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9: Verificar Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h1 class="card-title">Verificación de Acceso (Login Simulado) 🔒</h1>
            <hr>

            <?php
            // Comprobar si existe la clave 'rol' en $_SESSION
            if (isset($_SESSION['rol'])) {
                $rol = htmlspecialchars($_SESSION['rol']);
                
                // --- ACCESO CONCEDIDO ---
            ?>
                <div class="alert alert-success mt-4" role="alert">
                    <h4 class="alert-heading">¡Acceso Concedido! 🎉</h4>
                    <p class="lead">
                        Estás logueado como: <strong><?php echo $rol; ?></strong>
                    </p>
                    <p class="mb-0">Tu ID de Sesión es: <?php echo session_id(); ?></p>
                </div>
                
                <a href="<?php echo $script_logout; ?>" class="btn btn-danger btn-lg mt-3">
                    Destruir Sesión (Logout) ❌
                </a>

            <?php
            } else {
                // --- ACCESO DENEGADO ---
            ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <h4 class="alert-heading">Acceso Denegado 🛑</h4>
                    <p class="lead">
                        No se ha encontrado la clave **'rol'** en la sesión.
                    </p>
                    <p class="mb-0">Por favor, inicia sesión para continuar.</p>
                </div>
                
                <a href="<?php echo $script_login; ?>" class="btn btn-success btn-lg mt-3">
                    Login (Ir a <?php echo $script_login; ?>)
                </a>

            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>