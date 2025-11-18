
<?php
// form.php
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];
    setcookie("centro", $centro, time() + 60); // Expira en 1 minuto
    header("Location: receptor.php");
    exit;
}
?>


