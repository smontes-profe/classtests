<?php
require 'auth_check.php';
require 'bootstrapAct6.php';

$error = null;
$exito = null;
$usuarios = [];
$builder = null; 

try {
   $builder = Core\App::get('QueryBuilder');
} catch (\Exception $e) {
    $error = "ERROR DE CONEXIÓN: " . $e->getMessage();
}

if ($builder && isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    
    if ($id === $_SESSION['user_id']) {
        $error = "No puedes eliminarte a ti mismo.";
    } else {
        try {
            if ($builder->delete('usuarios', $id)) {
                $exito = "Usuario con ID {$id} eliminado correctamente.";
            } else {
                $error = "No se pudo eliminar el usuario con ID {$id}."; 
            }
        } catch (\Exception $e) {
            $error = "Error al ejecutar DELETE: " . $e->getMessage();
        }
    }
}

if (!$error && $builder) {
    try {
        $usuarios = $builder->all('usuarios');
    } catch (\Exception $e) {
        $error = "Error al cargar la lista: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Usuarios</title>
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
        <h1 class="mb-4">Lista de Usuarios</h1>
        
        <?php if ($exito): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($exito); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_GET['exito'])): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_GET['exito']); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (!empty($usuarios)): ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Usuario</th>
                        <th>Email</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['nombre_usuario']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                            <td class="text-center">
                                <a href="edit_user.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td class="text-center">
                                <?php if ($usuario['id'] != $_SESSION['user_id']): ?>
                                    <a href="index.php?delete_id=<?php echo $usuario['id']; ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('¿Está seguro de que desea eliminar a <?php echo htmlspecialchars($usuario['nombre_usuario']); ?>?');">
                                        Eliminar
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-secondary" disabled>Eliminar</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif (!$error): ?>
            <div class="alert alert-info">No hay usuarios registrados.</div>
        <?php endif; ?>
    </div>
</body>
</html>