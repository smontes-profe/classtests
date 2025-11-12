<?php
if (isset($_COOKIE['centro'])) {
    echo "<h2>Valor de la cookie 'centro': " . htmlspecialchars($_COOKIE['centro']) . "</h2>";
    echo "<p>Recuerda: la cookie expirará en 1 minuto desde su creación.</p>";
} else {
    header("Location: form.php");
    exit();
}
?>