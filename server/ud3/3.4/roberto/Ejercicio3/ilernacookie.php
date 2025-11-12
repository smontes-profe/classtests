<?php
// Crear una cookie llamada "centro" con el valor "Ilerna"
// Expira en 30 segundos desde el momento actual
setcookie("centro", "Ilerna", time() + 30);

// Mostrar mensaje informativo
echo "<h1> Cookie creada correctamente</h1>";
echo "<p>Nombre: centro</p>";
echo "<p>Valor: Ilerna</p>";
echo "<p>Expira en 30 segundos.</p>";
?>
