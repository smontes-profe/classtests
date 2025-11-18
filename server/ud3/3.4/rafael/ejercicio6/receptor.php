<?php
if (isset($_COOKIE['centro'])) {
    echo "Cookie 'centro': " . $_COOKIE['centro'];

    // Eliminar la cookie poniendo un tiempo negativo
    setcookie('centro', '', time() - 3600);
} else {
    header('Location: form.php');
    exit();
}
?>