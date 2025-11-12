<?php

//Si se recibe centro por get
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];

    //Se crea una coockie centro con el valor recibido, que durara 60 segundos
    setcookie("centro", $centro, time() + 60);

     //Reedirijo al usuario a receptor.php y se termina la ejecucion
    header("Location: receptor.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Formulario Centro</title></head>
<body>
<h2>Introduce tu centro</h2>
<form method="get" action="form.php">
    <input type="text" name="centro" required>
    <button type="submit">Enviar</button>
</form>
</body>
</html>