<?php
$nombre = 'centro';
$valor = 'Ilerna';
$duracion = 30;
$expira = time() + $duracion;

setcookie($nombre, $valor, $expira, '/');

// Pasamos la hora de expiración a JavaScript (en milisegundos)
$expira_js = $expira * 1000;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cookie creada</title>
</head>

<body>
    <main class="container">
        <h1>Cookie creada</h1>
        <p>Cookie <strong>'centro'</strong> con valor <strong>'Ilerna'</strong> creada y expira en 30 segundos.</p>
        <p>Tiempo restante: <span id="contador">calculando...</span></p>
        <p><a href="/ud3_2/ejercicio3/html/index.html">Volver</a></p>
    </main>

    <script>
        const expira = new Date(<?= $expira_js ?>).getTime();
        const contador = document.getElementById('contador');

        function actualizarContador() {
            const ahora = Date.now();
            const diff = expira - ahora;
            const segundos = Math.max(0, Math.floor(diff / 1000));
            contador.textContent = segundos + " s";

            if (diff <= 0) {
                contador.textContent = "¡Cookie expirada!";
                clearInterval(intervalo);
            }
        }

        actualizarContador();
        const intervalo = setInterval(actualizarContador, 1000);
    </script>
</body>

</html>