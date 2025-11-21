<?php
require 'bootstrapAct6.php';

$error = null;
$exito = false;
$nombre_usuario = '';
$email = '';

// Procesar el formulario al enviarse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener y sanitizar los datos del formulario
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($nombre_usuario) || empty($email) || empty($password)) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El formato del email no es válido.";
    } else {
        try {
            // Instanciar el QueryBuilder usando el contenedor de dependencias
            $builder = Core\App::get('QueryBuilder');

            // Verificar si el email ya está registrado
            if ($builder->findByEmail($email)) {
                $error = "El email '{$email}' ya está registrado.";
            // Uso de password_hash para almacenar la contraseña de forma segura
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $data = [
                    'nombre_usuario' => $nombre_usuario,
                    'email' => $email,
                    'password' => $hashed_password
                ];

                // Insertar el nuevo usuario en la base de datos
                if ($builder->insert('usuarios', $data)) {
                    header('Location: login.php?success=' . urlencode('Registro exitoso. Por favor, inicia sesión.'));
                    exit;
                } else {
                    $error = "Error desconocido al registrar el usuario.";
                }
            }
        } catch (\Exception $e) {
            $error = "Error fatal del sistema: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container" style="max-width: 500px; margin-top: 10vh;">
        <h1 class="text-center mb-4">Registrar Usuario</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="bg-white p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" value="<?php echo htmlspecialchars($nombre_usuario); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
        <div class="text-center mt-3">
            <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</body>

</html>