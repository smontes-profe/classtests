<!--
2. parte2.php: 
Escribe un programa que almacene en variables tu nombre, 
primer apellido, segundo apellido, email, año en el que naciste y móvil. 
Luego muéstralos por pantalla dentro de una tabla.  //1,5 PUNTOS.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td {
  border: 1px solid black;
}
</style>

<body>
    <?php
        $nombre = "Joan";
        $apellido1 = "griful";
        $apellido2 = "Lara";
        $email = "joangrifull@gmail.com";
        $anyoNacimiento = 2005;
        $mobil = 1234567890;
    ?>
    <table >
        <tr>
            <td>Nombre:</td>
            <td><?php echo $nombre; ?></td>
        </tr>


        <tr>
            <td>Primer Apellido:</td>
            <td><?php echo $apellido1; ?></td>
        </tr>


        <tr>
            <td>Segundo Apellido:</td>
            <td><?php echo $apellido2; ?></td>
        </tr>


        <tr>
            <td>Email:</td>
            <td><?php echo $email; ?></td>
        </tr>

        <tr>
            <td>Año de Nacimiento:</td>
            <td><?php echo $anyoNacimiento; ?></td>
        </tr>

        <tr>
            <td>Móvil:</td>
            <td><?php echo $mobil; ?></td>
        </tr>

    
</body>
</html>