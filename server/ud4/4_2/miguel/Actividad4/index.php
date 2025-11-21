<?php

require 'bootstrapAct4.php'; 

$error = null;
$exito = false;
$nombre_usuario = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($nombre_usuario) || empty($email) || empty($password)) {
        $error = "Todos los campos son obligatorios.";
    
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El formato del email no es válido.";
    } else {

        try {
            $config = Config\DatabaseAct4::getAll();
            $connection = new Database\ConnectionAct4($config);
            $pdo = $connection->getConnection(); 

            $builder = new Database\QueryBuilder($pdo);

            if ($builder->checkEmailExists($email)) {
                $error = "El email '{$email}' ya está registrado.";
            } else {
                
                // Cifrar la contraseña antes de almacenarla
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'nombre_usuario' => $nombre_usuario,
                    'email' => $email,
                    'password' => $hashed_password
                ];
                
                // Insertar el nuevo usuario
                if ($builder->insert('usuarios', $data)) {
                    $exito = true;
                    $nombre_usuario = '';
                    $email = ''; 
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
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registrar Nuevo Usuario</h1>

        <?php if ($exito): ?>
            <div class="alert alert-success" role="alert">
                Usuario registrado exitosamente. La contraseña ha sido **cifrada** con `password_hash()`.
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="bg-light p-4 rounded shadow-sm">
            
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
            
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>