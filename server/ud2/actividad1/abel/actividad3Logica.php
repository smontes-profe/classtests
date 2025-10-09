<?php
$nombre = $papellido = $sapellido = $edad = $email = $año = $movil = "";

if ($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET)) {
    $nombre = isset($_GET["nombre"]) ? htmlspecialchars($_GET["nombre"]) : "";
    $papellido = isset($_GET["papellido"]) ? htmlspecialchars($_GET["papellido"]) : "";
    $sapellido = isset($_GET["sapellido"]) ? htmlspecialchars($_GET["sapellido"]) : "";
    $edad = isset($_GET["edad"]) ? htmlspecialchars($_GET["edad"]) : "";
    $email = isset($_GET["email"]) ? htmlspecialchars($_GET["email"]) : "";
    $año = isset($_GET["año"]) ? htmlspecialchars($_GET["año"]) : "";
    $movil = isset($_GET["movil"]) ? htmlspecialchars($_GET["movil"]) : "";
}
?>
