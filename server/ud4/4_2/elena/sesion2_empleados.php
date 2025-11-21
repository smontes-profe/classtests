
<?php

if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

function flash_set($tipo, $mensaje) {
    $_SESSION['flash'][] = ['tipo'=>$tipo, 'mensaje'=>$mensaje];
}

function flash_show() {
    if (!empty($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $f) {
            $class = $f['tipo'] === 'ok' ? 'ok' : 'error';
            echo '<p class="'.$class.'">'.htmlspecialchars($f['mensaje']).'</p>';
        }
        unset($_SESSION['flash']);
    }
}
?>


