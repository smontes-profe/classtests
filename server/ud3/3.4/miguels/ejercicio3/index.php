<?php

$userIlerna = $_POST['userIlerna'] ?? null;

$loginAccess = false;

if ($userIlerna === 'ilerna') {
    $loginAccess = true;
}

if ($loginAccess) {

    $cookieName = 'sesion_user';
    $cookieVakue = 'user_token_123';
    $expiration = time() + 30;

    setcookie($cookieName, $cookieVakue, $expiration, '/', '', true, true);
}

$pageTitle = "Login User";
$message = $loginAccess ? "Login correcto" : "Por favor, vuelve a identificarte.";

include "views/cookies_manager.php";