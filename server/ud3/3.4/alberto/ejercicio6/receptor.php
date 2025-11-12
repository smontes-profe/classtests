<?php
$path = '/'; 

if (isset($_COOKIE['centro'])) {
    $valor_centro = htmlspecialchars($_COOKIE['centro']);
    
    echo "<h1>Receptor y Borrado de Cookie</h1>";
    echo "<p>Cookie 'centro' encontrada. Valor: <strong>$valor_centro</strong></p>";

    setcookie("centro", "", time() - 3600, $path);
    
    echo "<p><strong>¡Cookie 'centro' borrada!</strong> En la próxima carga de esta página serás redirigido a form.php.</p>";
    
} else {
    header('Location: form.php');
    exit;
}
?>
