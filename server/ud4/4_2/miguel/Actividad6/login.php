<?php
session_start();
require 'bootstrapAct6.php';

$error = null;
$email = '';

// Redirigir si el usuario ya está logueado
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Email y contraseña son obligatorios.";
    } else {
        try {
            $builder = Core\App::get('QueryBuilder');

            // Buscar el usuario por email
            $user = $builder->findByEmail($email);

            // Verificar la contraseña usando password_verify
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nombre_usuario'];
                header('Location: index.php');
                exit;
            } else {
                $error = "Credenciales incorrectas.";
            }
        } catch (\Exception $e) {
            $error = "Error del sistema: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Gestor de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container" style="max-width: 500px; margin-top: 10vh;">
        <h1 class="text-center mb-4">Iniciar Sesión</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="bg-white p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Acceder</button>
        </form>
        <div class="text-center mt-3">
            <a href="register.php">¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </div>
</body>

</html>