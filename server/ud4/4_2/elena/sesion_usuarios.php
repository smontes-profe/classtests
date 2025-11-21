
<?php

if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

function auth_require() {
    if (empty($_SESSION['user'])) {
        header('Location: /usuarios/login.php');
        exit;
    }
}
?>


