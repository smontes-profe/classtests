
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 4</title>
</head>
<body>
    <?php
    
       if (isset($_GET['edad'])) {
        $edad = (int) $_GET["edad"];       
        $anyoActual = date("Y");        
        $edadFuturo = $edad + 10;        
        $edadPasado = $edad - 10;         
        $anyoFuturo = $anyoActual + 10;    
        $anyoPasado = $anyoActual - 10;   

        $anyoNacimiento = $anyoActual - $edad;

        $anyoJubilacion = $anyoNacimiento + 67;
       }
    ?>

        <div class="resultado">
            <p>Tu edad actual es: <?php echo $edad;?> años</p>
            <p>Dentro de 10 años tendrás <?php echo $edadFuturo;?> años, y estaremos en el año <?php echo $anyoFuturo;?></p>
            <p>Hace 10 años tenías <?php echo $edadPasado;?> años, y estábamos en el año <?php echo $anyoPasado;?></p>
            <p>Tu año de jubilación será <?php echo $anyoJubilacion;?></p>
        </div>

</body>
</html>


