<?php
    $fecha=date('l \t\h\e jS');
    $hora=date("H:i:s");
    $nombre="Manuel";
    $apellido="Andrade";
    const EDAD=22;
    const EDAD10=EDAD+10;
    const EDAD20=EDAD+20;
    const EDADX2=EDAD*2;
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
?>

<script>
    // Función común para todos los botones
    function mostrarResultado(opcion) {
      let resultado = "";
      switch(opcion) {
        case "10":
          resultado = <?php echo EDAD10; ?>;
          document.getElementById("resultado").innerHTML =
            `Dentro de 10 años tendré ${resultado}.`;
          break;
        case "20":
          resultado = <?php echo EDAD20; ?>;
          document.getElementById("resultado").innerHTML =
            `Dentro de 20 años tendré ${resultado}.`;
          break;
        case "doble":
          resultado = <?php echo EDADX2; ?>;
          document.getElementById("resultado").innerHTML =
            `El doble de mi edad es ${resultado}.`;
          break;
      }
    }
  </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>
<body>
    <h2>Datos del dia de hoy</h2>
        <p>Fecha de hoy <?php echo $fecha; ?> </p>
        <p>Hora actual <?php echo $hora; ?></p>
    <h2>Datos del usuario</h2>
        <p>Soy <?php echo $nombre . " " . $apellido . " y tengo " . EDAD . " años." ?></p>
    <h2>Operaciones con mi edad</h2>
        <button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
        <button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
        <button onclick="mostrarResultado('doble')">Que pase el doble</button>
    <div id="resultado"></div>
</body>
</html>
