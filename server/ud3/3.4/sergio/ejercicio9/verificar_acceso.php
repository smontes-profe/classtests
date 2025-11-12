<?php

//Inicio la sesion en php
session_start();

//Verifico si existe la variable de sesion rol
if (isset($_SESSION['rol'])) {

    //Si existe muestro mensaje de acceso concedido y un boton para destruir la sesion 
    echo "<h3>Acceso concedido como: " . $_SESSION['rol'] . "</h3>";
    echo '<form action="cerrar_sesion.php" method="post">
            <button type="submit">Destruir sesión</button>
          </form>';
} else {


    //Si no existe, muestro acceso denegado y un boton para inicar sesion
    echo "<h3>Acceso denegado</h3>";
    echo '<a href="iniciar_sesion.php"><button>Login</button></a>';
}
?>