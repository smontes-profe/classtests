<?php
session_start();

if (isset($_SESSION['rol'])) {
    echo "Acceso concedido como: " . $_SESSION['rol'];
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