
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1'); // Directivas de configuración
ini_set('display_startup_errors', '1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD 2 - Actividad 1</title>
</head>

<body>

    <?php 
        $fechaHora = date("d/m/Y H:i:s"); // Fecha y hora actual

        $nombre = "Elena"; // Variable nombre
        $apellido = "Mena"; // Variable apellido
        $edad = 19; // Variable edad

        // Variables sumas y multiplicación
        $edad10 = $edad + 10;
        $edad20 = $edad + 20;
        $edadx2 = $edad * 2;
    ?>

    <script>
        function mostrarEdad(opcion) { // Función en JavaScript

             let resultado;

             switch(opcion) {
                case 'edad10':
                    resultado = <?php echo $edad10; ?>;
                    break;
                case 'edad20':
                    resultado = <?php echo $edad20; ?>;
                    break;
                case 'edadx2':
                    resultado = <?php echo $edadx2; ?>;
                    break;
             }

             alert("Tu edad es: " + resultado);
        }
             
    </script>

    <p>La fecha y hora es <?php echo $fechaHora;?></p>

    <p>
        Me llamo <?php echo $nombre . " " . $apellido;?> y tengo <?php echo $edad;?> años
    </p>

    // Botones
    <button onclick="mostrarEdad('edad10')">Hacer pasar 10 años</button>
    <button onclick="mostrarEdad('edad20')">Hacer pasar 20 años</button>
    <button onclick="mostrarEdad('edadx2')">Que pase el doble</button>

</body>
</html>


