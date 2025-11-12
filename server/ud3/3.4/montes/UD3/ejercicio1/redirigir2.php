<?php
//! Verificar si esta  o no vacio la petición 
$centro = isset($_GET["centro"]) ? $_GET["centro"] : "";
$mensajeEror = "";

if ($centro === "Ilerna") {
    header("Location: https://www.ilerna.es");
    exit();
} else if ($centro !== "") {
    $mensajeEror = "Booooo! Fuera!!!";
} else {
    $mensajeEror = "No has introducido ningún dato.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio01</title>
</head>

<body>
    <h1>Inicio de Sesión de Ilerna</h1>
    <form method="get" action="redirigir2.php">
        <div>
            <label for="centro">Introduce el Centro</label>
            <input type="text" name="centro">
        </div>
        <button type="submit">Enviar</button>
    </form>
    <div> <?php echo $mensajeEror ?></div>

</body>

</html>