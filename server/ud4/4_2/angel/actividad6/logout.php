<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: ../actividad1/config.php');
exit;
