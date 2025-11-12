<?php
if(isset($_GET['centro'])){
   setcookie("centro", $_GET['centro'], time() + 60);
    
   header('Location: receptorEJ5.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Centro</title>
</head>
<body>
    <h1>Introduce el centro</h1>
    <form method="get" action="formEJ5.php">
        <label for="centro">Centro:</label>
        <input type="text" name="centro" id="centro" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>