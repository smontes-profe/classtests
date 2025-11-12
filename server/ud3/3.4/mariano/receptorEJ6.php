<?php
if (isset($_COOKIE['centro'])) {
    echo "<h2>Valor de la cookie 'centro': " . htmlspecialchars($_COOKIE['centro']) . "</h2>";

    setcookie("centro", "", time() - 3600, "/"); 

    echo "<p>La cookie ha sido eliminada. Refresca la página para comprobar que ya no existe.</p>";
} else {
    header("Location: formEJ5.php");
    exit();
}
?>
