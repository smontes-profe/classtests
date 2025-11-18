<?php
// ¡Fundamental! session_start() debe ser la primera instrucción.
session_start();

// 1. Guardar el valor "Administrador" en la clave 'rol' del array $_SESSION
$_SESSION['rol'] = "Administrador";

// También guardamos la hora de creación para demostrar la persistencia
$_SESSION['tiempo_inicio'] = date('H:i:s');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8: Guardar Valor en Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pre-dump {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 0.25rem;
            white-space: pre-wrap;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="card-title text-success">Guardar Valor en Sesión 💾</h1>
            <p class="lead">Se ha guardado el rol **"<?php echo $_SESSION['rol']; ?>"** en la sesión.</p>
            
            <div class="alert alert-info mt-3" role="alert">
                <strong>ID de Sesión:</strong> <span class="text-break"><?php echo session_id(); ?></span>
            </div>

            <h2>Contenido de $_SESSION</h2>
            <pre class="pre-dump">
<?php var_dump($_SESSION); ?>
            </pre>
            
            <h3 class="mt-4">Punto 9: Simular Verificación de Acceso</h3>
            <a href="verificarAcceso.php" class="btn btn-primary btn-lg">
                Verificar Acceso (ir a verificarAcceso.php)
            </a>
            
        </div>
    </div>
</body>
</html>