<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act2_Servidor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        $edad=25;
        $nombre= "Alberto"; 
        $edad10 = $edad + 10;
        $edad20 = $edad + 20;
        $edadx2 = $edad * 2;
    ?>
    <haeader>
        <h2>UD 2. Actividad 1.</h2>
        <p>
            Hoy es: <?php echo date("y/m/d"); ?>, <?php echo date("h:i:s"); ?>
        </p>
    </haeader>

    <main>
        <div id="caja">
            <p>
                <br>Soy <?=$nombre?>, tengo <?=$edad?> años
            </p>
            
            <button class="btn" onclick="mostrarResultado(10)" id="10">hacer pasar 10 años</button>
            <button class="btn" onclick="mostrarResultado(20)" id="20">hacer pasar 20 años</button>
            <button class="btn" onclick="mostrarResultado(2)" id="2">Que pase el doble!</button>
            
            <p id="resultado">Resultado</p>
        </div>
        
    </main>
</body>
</html>

<script>


    function mostrarResultado(opcion) {
    
    let resultado = "";

    switch(opcion) {

        case 10:

          resultado = <?php echo $edad10 ?>;

          document.getElementById("resultado").innerHTML =
        
            `Dentro de 10 años tendré ${resultado}.`;

          break;

        case 20:

          resultado = <?php echo $edad20 ?>

          document.getElementById("resultado").innerHTML =

            `Dentro de 20 años tendré ${resultado}.`;

          break;

        case 2:

          resultado = <?php echo $edadx2 ?>

          document.getElementById("resultado").innerHTML =

            `El doble de mi edad es ${resultado}.`;

          break;

      }

    }

  </script>
