<?php

//Creo una coockie llamada centro con el valor ilerna que expira en 30 segundos
setcookie("centro", "Ilerna", time() + 30);

//Muestra el mensaje para confirmar la creacion de la coockie
echo "Cookie 'centro' creada por 30 segundos.";
?>