<?php
if (isset($_COOKIE["centro"])) {
    echo "<h2>Cookie 'centro' encontrada</h2>";
    echo "<p>Valor: " . $_COOKIE["centro"] . "</p>";
    setcookie("centro", "", time() - 3600, "/");

    echo "<p>La cookie 'centro' ha sido eliminada.</p>";
} else {
    header("Location: form.php");
    exit;
}
?>