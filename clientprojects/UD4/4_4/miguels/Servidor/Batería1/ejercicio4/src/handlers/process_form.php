<?php

$name = $_POST['name'] ?? "";
$surname = $_POST['surname'] ?? "";
$email = $_POST['email'] ?? "";

$errors = [];

$old_data = [
    'name' => $name,
    'surname' => $surname,
    'email' => $email
];

if (empty($name)) {
    $errors['name'] = 'El nombre es obligatorio';
}

if (empty($surname)) {
    $errors['surname'] = 'Los apellidos son obligatorios';
}

if (empty($email)) {
     $errors['email'] = 'El email es obligatorio';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'El email no es válido';
}


if (count($errors) > 0) {
    require '../src/views/form.view.php'; 
} else {
    $full_name = $name . ' ' . $surname; 
    require '../src/views/sucess.view.php';
}