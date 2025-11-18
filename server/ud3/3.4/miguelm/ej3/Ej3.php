<?php
// Crear cookie que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);

echo "Cookie 'centro' creada con valor 'Ilerna' - Expira en 30 segundos";
?>