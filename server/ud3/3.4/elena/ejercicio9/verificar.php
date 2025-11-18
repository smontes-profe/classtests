
<?php
session_start();

if (isset($_SESSION['rol'])) {
    echo "Acceso concedido como: " . $_SESSION['rol'] . "<br>";
    echo '<form action="cerrar_sesion.php" method="post"> // Boton para cerrar sesion
            <button type="submit">Destruir sesión</button>
          </form>';
} else {
    echo "Acceso denegado"<br>;
    echo '<a href="iniciar_sesion.php"><button>Login</button></a>';
}
?>


