
<?php
// receptor.php
if (isset($_COOKIE['centro'])) {
    echo "Valor de la cookie: " . $_COOKIE['centro'];
} else {
    header("Location: form.php");
    exit;
}
?>


