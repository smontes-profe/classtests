<?php
session_start();
$_SESSION["rol"] = "Administrador";

echo "<h1>Login (iniciar_sesion.php)</h1>";
echo "ID de la sesión: <strong>" . session_id() . "</strong><br>";
echo "Valor guardado: \$_SESSION[\'rol\'] = <strong>" . htmlspecialchars($_SESSION["rol"]) . "</strong><br><br>";
echo "<a href=\"verificar_acceso.php\">Ir a Verificar Acceso</a>";
?>
