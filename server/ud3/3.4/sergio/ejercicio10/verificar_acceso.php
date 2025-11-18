<?php

//Inicio la sesion en php
session_start();

//Compruebo si existe la variable de sesion rol
if (isset($_SESSION['rol'])) {

    //Si existe, mustro el mensaje de acceso concedido y el boton para cerrar la sesion 
    echo "<h3>Acceso concedido como: " . $_SESSION['rol'] . "</h3>";
    echo '<form action="cerrar_sesion.php" method="post">
            <button type="submit">Destruir sesión</button>
          </form>';
} else {

    //Si no existe mustro el mensaje de acceso denegado y el boton para inicar la sesion
    echo "<h3>Acceso denegado</h3>";
    echo '<a href="iniciar_sesion.php"><button>Login</button></a>';
}
?>