<?php
require 'auth_check.php';
require 'bootstrapAct6.php';

$error = null;
$exito = null;
$usuario = [
    'id' => null,
    'nombre_usuario' => '',
    'email' => ''
];
$builder = null;

try {
   $builder = Core\App::get('QueryBuilder');
} catch (\Exception $e) {
    $error = "ERROR DE CONEXIÓN: " . $e->getMessage();
}

if ($builder && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : null;
    $data = [
        'nombre_usuario' => trim($_POST['nombre_usuario']),
        'email' => trim($_POST['email'])
    ];
    $new_password = $_POST['password'];

    if (!$id) {
         $error = "ID de usuario no válido.";
    } elseif (empty($data['nombre_usuario']) || empty($data['email'])) {
         $error = "Nombre de usuario y Email son obligatorios.";
         $usuario = array_merge($usuario, ['id' => $id], $data);
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
         $error = "Formato de email incorrecto.";
         $usuario = array_merge($usuario, ['id' => $id], $data);
    } else {
        try {
            if (!empty($new_password)) {
                $data['password'] = password_hash($new_password, PASSWORD_DEFAULT);
            }
            
            if ($builder->update('usuarios', $id, $data)) {
                $exito = "Usuario ID {$id} actualizado correctamente.";
                if ($id == $_SESSION['user_id']) {
                     $_SESSION['user_name'] = $data['nombre_usuario'];
                }
            } else {
                $error = "No se pudo actualizar el registro.";
            }
            $usuario_data = $builder->find('usuarios', $id);
            if ($usuario_data) $usuario = $usuario_data;

        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                $error = "Error: El email '{$data['email']}' ya está en uso por otro usuario.";
            } else {
                $error = "Error en la operación de BBDD: " . $e->getMessage();
            }
            $usuario = array_merge($usuario, ['id' => $id], $data);
        }
    }
}

$id_to_load = isset($_GET['id']) ? (int)$_GET['id'] : (isset($id) ? $id : null);

if ($builder && $id_to_load && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    try {
        $usuario_data = $builder->find('usuarios', $id_to_load);
        if ($usuario_data) {
            $usuario = $usuario_data;
        } else {
            header('Location: index.php?error=' . urlencode('El usuario solicitado no existe.'));
            exit;
        }
    } catch (\Exception $e) {
        $error = "Error al cargar los datos: " . $e->getMessage();
    }
}

if (!$id_to_load) {
     header('Location: index.php?error=' . urlencode('Se requiere un ID de usuario para editar.'));
     exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gestor de Usuarios</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">✏️ Editar Usuario ID <?php echo htmlspecialchars($usuario['id']); ?></h1>
        
        <?php if ($exito): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($exito); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="edit_user.php" method="POST" class="bg-light p-4 rounded shadow-sm">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id'] ?? ''); ?>">
            
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña (Opcional)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Dejar en blanco para no cambiar">
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="index.php" class="btn btn-secondary">Volver al Listado</a>
        </form>
    </div>
</body>
</html>