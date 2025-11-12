<?php
if (isset($_COOKIE['centro'])) {
    $valor_centro = htmlspecialchars($_COOKIE['centro']);
    
    echo "<h1>Receptor de Cookie</h1>";
    echo "<p>Cookie 'centro' encontrada. Valor: <strong>$valor_centro</strong></p>";
    
} else {
    header('Location: form.php');
    exit;
}
?>
