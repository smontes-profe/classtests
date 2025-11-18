<?php
session_start();

if (isset($_SESSION['rol'])) {
    echo "Acceso concedido como: " . $_SESSION['rol'];
    ?>
    <br><br>
    <form action="cerrar_sesion.php" method="GET">
        <button type="submit">Destruir sesión</button>
    </form>
    <?php
} else {
    echo "Acceso denegado";
    ?>
    <br><br>
    <form action="iniciar_sesion.php" method="GET">
        <button type="submit">Login</button>
    </form>
    <?php
}
?>