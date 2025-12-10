<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require '../src/handlers/process_form.php';

} else {

    $errors = [];
    $old_data = [];

    require '../src/views/form.view.php';
}