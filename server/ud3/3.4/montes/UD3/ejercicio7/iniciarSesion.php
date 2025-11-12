<?php
// La función session_start() debe llamarse al comienzo del script,
// antes de cualquier salida HTML.
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7: Inicialización de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="card-title text-success">Inicialización de Sesión ✅</h1>
            <p class="lead">Se ha iniciado la sesión en este script mediante `session_start()`. El ID de sesión es persistente a través de las peticiones.</p>
            
            <div class="alert alert-info mt-3" role="alert">
                <strong>ID de Sesión Actual:</strong>
                <h3 class="mt-2 text-break"><?php echo session_id(); ?></h3>
            </div>
            
            <p class="mt-3">
                **Instrucción:** **Refresca** la página varias veces. Verás que el ID de sesión **no cambia**, demostrando la persistencia de la sesión para tu navegador.
            </p>
        </div>
    </div>
</body>
</html>