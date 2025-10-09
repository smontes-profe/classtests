<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad1</title>
</head>
<body>
    <div>
        <h1>Fecha y hora actuales español</h1>

        <?php 
        // Establecemos la zona horaria a Madrid (España)
        date_default_timezone_set('Europe/Madrid'); 

        // Mostramos la fecha y la hora actual en formato día/mes/año horas:minutos:segundos
        echo date('d/m/Y H:i:s'); 
        ?>
    </div>

    <div>
        <h1>Definir variables</h1>

        <?php 
        // Definimos tres variables: nombre, apellido y edad
        $nombre = "Mariano";
        $apellido = "Verdugo Gonzalez";
        $edad = 19;

        // Mostramos las variables concatenadas dentro de un string
        echo "Soy $nombre $apellido y tengo $edad años.";
        ?>
    </div>

    <div>
        <h1>Definir tres variables derivadas</h1>
        <?php
        // Creamos nuevas variables a partir de la edad
        $edad10 = 10 + $edad; // edad dentro de 10 años
        $edad20 = 20 + $edad; // edad dentro de 20 años
        $edadx2 = $edad * 2;  // el doble de la edad

        // Mostramos los resultados
        ?>
        <p id="resultado"></p>

    </div>

    <div>
        <h1>Tres botones</h1>
        <script>
            // Pasamos valores de PHP a JavaScript para usarlos en la lógica de los botones
            const edad10 = <?php echo $edad + 10; ?>;
            const edad20 = <?php echo $edad + 20; ?>;
            const edadx2 = <?php echo $edad * 2; ?>;

            // Función que muestra la edad según el botón pulsado
            function mostraredad(accion){
                let resultado;

                if(accion === '10'){
                    // Si se pulsa el botón de 10 años
                    resultado = 'Dentro de 10 años tendré ' + edad10 + ' años';
                } else if(accion === '20'){
                    // Si se pulsa el botón de 20 años
                    resultado = 'Dentro de 20 años tendré ' + edad20 + ' años';
                } else if(accion === 'doble'){
                    // Si se pulsa el botón del doble de edad
                    resultado = 'El doble de mi edad actual es ' + edadx2 + ' años';
                }

                // Muestra el resultado en una ventana emergente
                document.getElementById('resultado').innerText = resultado;
            }
        </script>

        <!-- Botones que llaman a la función con distintos parámetros -->
        <button onclick="mostraredad('10')">Hacer pasar 10 años</button>
        <button onclick="mostraredad('20')">Hacer pasar 20 años</button>
        <button onclick="mostraredad('doble')">Que pase el doble</button>
    </div>

    <div>
        <h1> Directiva de configuración</h1>
        <?php 
        // Activamos la visualización de errores en PHP
        // E_ALL → muestra todos los tipos de errores y advertencias
        error_reporting(E_ALL); 
        // Mostramos los errores en pantalla en lugar de ocultarlos
        ini_set('display_errors', 1);
        ?>   
    </div>

</body>
</html>
