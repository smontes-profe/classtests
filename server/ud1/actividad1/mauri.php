<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD 2 Actividad 1</title>
</head>
<body>
    <?php
    $nombre = "Mauri";
    $apellidos = "Pacheco Parra";
    $edad = 22;
    
    
    $edad10 = $edad + 10;
    $edad20 = $edad + 20;
    $edadx2 = $edad * 2;

    // Parte 5
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
    
    <h1>Parte 1</h1>
    <p>Fecha y hora del servidor:<?php echo date('d/m/Y H:i:s'); ?></p>
    
    <h1>Parte 2</h1>
    <p>Soy <?php echo $nombre . " " . $apellidos; ?>, y tengo <?php echo $edad; ?> años.</p>
    
    <h1>Parte 3 y 4</h1>
    
    <button onclick="mostrarResultado('10')">
        Hacer pasar 10 años
    </button>
    
    <button onclick="mostrarResultado('20')">
        Hacer pasar 20 años
    </button>
    
    <button onclick="mostrarResultado('doble')">
        Que pase el doble
    </button>
    
    <div id="resultado">
    </div>

     <script>
        // Función común para todos los botones
        function mostrarResultado(opcion) {
            let resultado = "";

            switch(opcion) {
                case "10":
                    resultado = <?php echo $edad10; ?>;
                    document.getElementById("resultado").innerHTML =
                        `Dentro de 10 años tendré ${resultado} años.`;
                    break;
                case "20":
                    resultado = <?php echo $edad20; ?>;
                    document.getElementById("resultado").innerHTML =
                        `Dentro de 20 años tendré ${resultado} años.`;
                    break;
                case "doble":
                    resultado = <?php echo $edadx2; ?>;
                    document.getElementById("resultado").innerHTML =
                        `El doble de mi edad es ${resultado} años.`;
                    break;
            }
        }
    </script>
</body>
</html>