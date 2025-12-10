<?php

$name = $_GET['name'] ?? '';
$surname = $_GET['surname'] ?? '';
$email = $_GET['email'] ?? '';

$erors = [];

$old_data = [
    'name' => $name,
    'surname' => $surname,
    'email' => $email
];

if ($name === '') {
    $erors['name'] = 'El nombre es obligatorio';
}

if ($surname === '') {
    $erors['surname'] = 'Los appellidos son obligatorios';
}

if ($email === '') {
    $erors['email'] = 'El correo es obligatorio';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erors['email'] = 'El correo no es válido';
}


require '../public/index.php';
?>