
<?php
// receptor.php
if (isset($_COOKIE['centro'])) {
    echo "Valor de la cookie: " . $_COOKIE['centro'] . "<br>";
    setcookie("centro", "", time() - 3600);
    echo "Cookie borrada";
} else {
    header("Location: form.php");
    exit;
}
?>


