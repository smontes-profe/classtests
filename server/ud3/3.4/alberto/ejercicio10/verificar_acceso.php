<?php
session_start();

echo "<h1>Verificación de Acceso y Cierre de Sesión </h1>";
echo "ID de la sesión: " . session_id() . "<br><br>";

if (isset($_SESSION['rol'])) {
    $rol = htmlspecialchars($_SESSION['rol']);
    echo "<h3>✅ Acceso concedido como: <strong>$rol</strong></h3>";
    
    echo "<form action=\"cerrar_sesion.php\" method=\"post\">";
    echo "<button type=\"submit\">Destruir sesión</button>";
    echo "</form>";
    
} else {
    echo "<h3>❌ Acceso denegado</h3>";
    
    echo "<form action=\"iniciar_sesion.php\" method=\"get\">";
    echo "<button type=\"submit\">Login</button>";
    echo "</form>";
}
?>
