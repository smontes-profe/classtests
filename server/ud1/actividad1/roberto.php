<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
    <h1>PHP</h1>
    
    <?php
    // Directiva de configuración
    error_reporting(E_ALL);
    
    // Fecha y hora actual
    echo "<p>Fecha y hora: " . date('d/m/Y H:i:s') . "</p>";
    
    // Variables del usuario
    $nombre = "Sergio";
    $apellidos = "Montes";
    $edad = 25;
    
    echo "<p>Soy $nombre $apellidos, y tengo $edad años</p>";
    
    // Calculamos las edades
    $edad10 = $edad + 10;
    $edad20 = $edad + 20;
    $edadx2 = $edad * 2;
    ?>
    
    <!-- Botones simples -->
    <button onclick="mostrar10()">Hacer pasar 10 años</button>
    <button onclick="mostrar20()">Hacer pasar 20 años</button>
    <button onclick="mostrarDoble()">Que pase el doble</button>
    
    <div id="resultado"></div>

    <script>
    function mostrar10() {
        document.getElementById("resultado").innerHTML = "En 10 años tendrás <?php echo $edad10; ?> años";
    }
    
    function mostrar20() {
        document.getElementById("resultado").innerHTML = "En 20 años tendrás <?php echo $edad20; ?> años";
    }
    
    function mostrarDoble() {
        document.getElementById("resultado").innerHTML = "El doble de tu edad sería <?php echo $edadx2; ?> años";
    }
    </script>
</body>
</html>