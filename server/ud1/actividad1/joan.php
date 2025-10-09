<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Act1 PHP</title>
</head>
<body>

    <?php
    
    echo "Fecha y hora actual: " . date("d/m/Y H:i:s") . "<br><br>";

    
    $nombre = "joan";
    $apellidos = "Griful";
    $edad = 20;
    echo "Soy $nombre $apellidos, y tengo $edad años<br><br>";

        $edad10 = $edad + 10;
    $edad20 = $edad + 20;
    $edadx2 = $edad * 2;

    
    
    ?>

    <button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
    <button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
    <button onclick="mostrarResultado('doble')">Que pase el doble</button>

    <div id="resultado"> </div>

    <script>
   
      const edad10 = <?php echo $edad10; ?>;
      const edad20 = <?php echo $edad20; ?>;
      const edadx2 = <?php echo $edadx2; ?>;

      function mostrarResultado(opcion) {
        let resultado = "";

        switch(opcion) {
          case "10":
            resultado = edad10;
            document.getElementById("resultado").innerHTML =
              `Dentro de 10 años tendré ${resultado}.`;
            break;

          case "20":
            resultado = edad20;
            document.getElementById("resultado").innerHTML =
              `Dentro de 20 años tendré ${resultado}.`;
            break;

          case "doble":
            resultado = edadx2;
            document.getElementById("resultado").innerHTML =
              `El doble de mi edad es ${resultado}.`;
            break;
        }
      }
    </script>

</body>
</html>
