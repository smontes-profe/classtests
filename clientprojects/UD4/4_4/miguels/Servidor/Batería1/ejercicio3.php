<?php

$name = $_GET['name'] ?? "";
$surname = $_GET['surname'] ?? "";
$email = $_GET['email'] ?? "";

function validarSoloTexto($texto)
{
    return preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/', $texto) === 1;
}

function esEmailValido($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <header>
        <h1>Ejercicio 3</h1>
    </header>
    <main>
        <div>
            <form method="GET">
                <label for="name" class="name" id="name">Nombre:</label>
                <input type="text" name="name" id="name">

                <label for="surname" class="surname" id="surname">Apellidos:</label>
                <input type="text" name="surname" id="surname">

                <label for="email" class="email" id="email">Email:</label>
                <input type="text" name="email" id="email">

                l
            </form>
        </div>

        <div>
            <section>
                <p id="mensaje">
                    <?php
                    if (!validarSoloTexto($name)) {
                        echo "El nombre no es válido.<br>";
                    } elseif (!validarSoloTexto($surname)) {
                        echo "El apellido no es válido.<br>";
                    } elseif (!esEmailValido($email)) {
                        echo "El correo electrónico no es válido.<br>";
                    } else {
                        echo "Todos los datos son válidos.<br>";
                    }
                    ?>
                </p>
            </section>
        </div>
    </main>
    <footer></footer>
</body>

</html>