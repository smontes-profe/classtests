<?php

if (!empty($_GET['centro'])) {  // verifica que exista y que no esté vacío
    // convierte a minúsculas para comparación insensible a mayúsculas
    $centro = strtolower($_GET['centro']);

    if ($centro === "ilerna") {
        header("Location: https://www.ilerna.es/");
        exit();
    } else {
        $echado = "Booooo! Fueraaaa!!!";
    }
} else {
    $noEspecificado = "No se ha especificado ningún centro.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="../../../css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Formulario de Centro</h2>
            <form method="get" action="redirigir2.php">
                <div class="mb-3">
                    <label for="centro" class="form-label">Introduce el centro</label>
                    <input type="text" name="centro" id="centro" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>

            <div class="mt-4">
                <?php
                if (isset($echado)) {
                    echo "<div class='alert alert-danger text-center'>$echado</div>";
                }
                if (isset($noEspecificado)) {
                    echo "<div class='alert alert-warning text-center'>$noEspecificado</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>