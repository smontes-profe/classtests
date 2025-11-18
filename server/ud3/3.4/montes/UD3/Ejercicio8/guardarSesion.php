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
            white-space: pre-wrap; /* Permite saltos de línea y envoltura */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="card-title text-success">Guardar Valor en Sesión 💾</h1>
            <p class="lead">Se ha iniciado la sesión y se ha guardado el valor **"Administrador"** en la clave `$_SESSION['rol']`.</p>
            
            <div class="alert alert-info mt-3" role="alert">
                <strong>ID de Sesión Actual:</strong>
                <h4 class="mt-2 text-break"><?php echo session_id(); ?></h4>
            </div>

            <h2>Contenido Completo de $_SESSION</h2>
            <p>El valor guardado es persistente. **¡Refresca la página!** El contenido de la sesión no cambiará.</p>
            
            <pre class="pre-dump">
<?php var_dump($_SESSION); ?>
            </pre>
            
            <h3 class="mt-4">Valor Específico Guardado</h3>
            <p class="fs-4">Rol: <strong><?php echo $_SESSION['rol']; ?></strong></p>
            
        </div>
    </div>
</body>
</html>