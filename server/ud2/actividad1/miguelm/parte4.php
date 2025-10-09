<?php 
// Obtenemos la edad desde la URL
if(isset($_GET['edad'])) {
    $edad = intval($_GET['edad']);
    
    
    $anyoActual = date("Y");
    
    
    $edadFutura = $edad + 10;
    $edadPasada = $edad - 10;
    
    
    $anyoFuturo = $anyoActual + 10;
    
    
    $anyosHastaJubilacion = 67 - $edad;
    $anyoJubilacion = $anyoActual + $anyosHastaJubilacion;
    
    
    echo "Edad actual: $edad años<br>";
    echo "<br>";
    
    echo "Hace 10 años:<br>";
    echo "- Tenías: $edadPasada años<br>";
    echo "<br>";
    
    echo "Dentro de 10 años:<br>";
    echo "- Tendrás: $edadFutura años<br>";
    echo "<br>";
    
    echo "Jubilación:<br>";
    if ($edad < 67) {
        echo "- Te jubilarás en el año $anyoJubilacion (dentro de $anyosHastaJubilacion años)<br>";
    } else {
        echo "- Ya has alcanzado la edad de jubilación<br>";
    }
} else {
    echo "Por favor, especifica una edad en la URL (ejemplo: parte4.php?edad=33)";
}
?>