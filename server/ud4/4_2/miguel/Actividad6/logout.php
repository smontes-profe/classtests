<?php
// Iniciar la sesión
session_start();
// Destruir todas las variables de sesión
session_unset();
// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito
header('Location: login.php?success=' . urlencode('Sesión cerrada correctamente.'));
exit;