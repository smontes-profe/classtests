<?php
if (isset($_POST["centro"])) {
    $valor = $_POST["centro"];
    setcookie("centro", $valor, time() + 3600, "/");
    echo "<p>Cookie 'centro' creada con valor: $valor</p>";
    echo "<p><a href='receptor.php'>Ir a receptor.php</a></p>";
} else {
?>
    <form method="post" action="">
        <label>Centro:</label>
        <input type="text" name="centro" required>
        <input type="submit" value="Crear cookie">
    </form>
<?php
}
?>