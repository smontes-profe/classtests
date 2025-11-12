<?php
setcookie('centro', 'Ilerna', time() + 30);

echo "<h3>Contenido completo de \$_COOKIE:</h3>";
var_dump($_COOKIE);

echo "<h3>Valor de la cookie 'centro':</h3>";
if (isset($_COOKIE['centro'])) {
    echo $_COOKIE['centro'];
} else {
    echo "La cookie 'centro' no existe todavía. Refresca la página.";
}
?>