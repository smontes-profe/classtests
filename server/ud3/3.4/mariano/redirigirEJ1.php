<?php
if (isset($_GET['centro'])) {
    $centro = $_GET['centro'];
if ($centro === 'Ilerna') {
    header('Location: https://www.ilerna.com');
    exit;
}else {
    echo "Booooooo! Fueraaaaa!!!";
}
} else {
    echo "No se ha proporcionado ningún centro.";
}
?>

