<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito</title>
</head>
<body>
    <h1>¡Gracias por registrarte!</h1>
    
    <p>Hola, <strong><?= htmlspecialchars($full_name, ENT_QUOTES, 'UTF-8') ?></strong>.</p>
    <p>Hemos recibido tu email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>

    <a href="index.php">Volver al formulario</a>
</body>
</html>