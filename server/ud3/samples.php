<?php
// Verificar si la cookie "accesos" existe
if (isset($_COOKIE['accesos'])) {
    // Recuperar el valor actual y sumarle 1
    $accesos = (int)$_COOKIE['accesos'] + 1;
} else {
    // Si no existe, empezamos desde 1
    $accesos = 1;
}

// Actualizar la cookie con el nuevo valor (expira en 30 días)
setcookie('accesos', $accesos, time() + 30 * 24 * 60 * 60);

// Mostrar el valor actualizado
echo "Número de accesos: " . $accesos;

// Hacer que la cookie "usuario" caduque
setcookie('usuario', '', time() - 3600); // tiempo en el pasado (1 hora atrás)
// Hacer que la cookie "usuario" caduque dentro de una
setcookie('usuario', '', time() + 3600); // tiempo en el pasado (1 hora atrás)

?>