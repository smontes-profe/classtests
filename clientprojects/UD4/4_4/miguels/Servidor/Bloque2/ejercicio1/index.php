<?php

define("CENTRO", "https://www.ilerna.es");

$centro = $_GET['centro'] ?? "";

if ($centro === "ilerna") {
    header("Location: " . CENTRO);
    exit;
}

include 'views/form.php';
