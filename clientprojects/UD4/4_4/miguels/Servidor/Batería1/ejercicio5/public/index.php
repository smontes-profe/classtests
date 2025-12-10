<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {

    require '../src/handlers/process.php';
} else {

    $erors = [];
    $old_data = [];

    require '../src/views/form.view.php';
}
