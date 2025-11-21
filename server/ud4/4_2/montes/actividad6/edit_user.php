<?php
/**
 * Script y Controlador de Edición de Usuario.
 *
 * - Si es GET: Muestra el formulario con los datos del usuario.
 * - Si es POST: Procesa la actualización.
 * - Protegido por sesión.
 * - Maneja la actualización condicional de la contraseña.
 */

// 1. Cargar dependencias
require_once __DIR__ . '/includes/db.php';
// header.php carga 'funciones.php' y 'startSecureSession()'
require_once __DIR__ . '/views/partials/header.php';

// 2. --- ¡SEGURIDAD! (REQUISITO) ---
requireAuth();

// 3. Inicializar variables
$errors = [];
$user_id = null;
$nombre = '';
$email = '';
$user_to_edit = null; // Para guardar los datos del usuario a editar

// 4. --- PROCESAMIENTO POST (Si se envía el formulario) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 4.1. Sanear y obtener datos del POST
    $user_id = (int) ($_POST['user_id'] ?? 0);
    $nombre = sanitizeInput($_POST['nombre'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? ''; // La contraseña nueva (si hay)

    // 4.2. Validación
    if (empty($nombre)) {
        $errors[] = "El nombre es obligatorio.";
    }
    if (empty($email)) {
        $errors[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del email no es válido.";
    }
    if ($user_id <= 0) {
        $errors[] = "ID de usuario no válido.";
    }
    
    // 4.3. Validación de contraseña (SOLO si se ha escrito una nueva)
    $hash_contraseña_nueva = null;
    if (!empty($password)) {
        if (strlen($password) < 6) {
            $errors[] = "La nueva contraseña debe tener al menos 6 caracteres.";
        } else {
            // Si es válida, la hasheamos para la BBDD
            $hash_contraseña_nueva = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    // 4.4. Comprobar si el email ya existe (para OTRO usuario)
    if (empty($errors)) {
        try {
            $sql_check = "SELECT id FROM usuarios WHERE email = ? AND id != ?";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([$email, $user_id]);
            
            if ($stmt_check->fetch()) {
                $errors[] = "Ese correo electrónico ya está en uso por otra cuenta.";
            }
        } catch (PDOException $e) {
            $errors[] = "Error al comprobar el email: " . $e->getMessage();
        }
    }

    // 4.5. Si no hay errores, ejecutar la actualización
    if (empty($errors)) {
        try {
            // Construimos la consulta dinámicamente
            // Si $hash_contraseña_nueva NO es null, actualizamos la contraseña
            if ($hash_contraseña_nueva !== null) {
                // --- Consulta Preparada (con contraseña) ---
                $sql_update = "UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE id = ?";
                $params = [$nombre, $email, $hash_contraseña_nueva, $user_id];
            } else {
                // --- Consulta Preparada (sin contraseña) ---
                $sql_update = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
                $params = [$nombre, $email, $user_id];
            }
            
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute($params);

            // Redirigir al dashboard con éxito
            header('Location: dashboard.php?status=updated');
            exit;

        } catch (PDOException $e) {
            $errors[] = "Error al actualizar el usuario: " . $e->getMessage();
        }
    }

// 5. --- PROCESAMIENTO GET (Si se carga la página) ---
} else {
    // 5.1. Validar el ID que viene por la URL
    $user_id = $_GET['id'] ?? null;
    if (!$user_id || !filter_var($user_id, FILTER_VALIDATE_INT)) {
        header('Location: dashboard.php?status=invalid_id');
        exit;
    }
    $user_id = (int) $user_id;

    // 5.2. Obtener los datos actuales del usuario de la BBDD
    try {
        // --- Consulta Preparada (SELECT) ---
        $sql_fetch = "SELECT id, nombre, email FROM usuarios WHERE id = ?";
        $stmt_fetch = $pdo->prepare($sql_fetch);
        $stmt_fetch->execute([$user_id]);
        
        $user_to_edit = $stmt_fetch->fetch();

        if (!$user_to_edit) {
            // El usuario no existe
            header('Location: dashboard.php?status=not_found');
            exit;
        }

        // 5.3. Rellenar las variables para el formulario
        $nombre = $user_to_edit['nombre'];
        $email = $user_to_edit['email'];

    } catch (PDOException $e) {
        $errors[] = "Error al cargar los datos del usuario: " . $e->getMessage();
    }
}

// 6. --- MOSTRAR ERRORES Y FORMULARIO (Se muestra en GET o si hay error en POST) ---

// 6.1. Mostrar errores (si los hay)
if (!empty($errors)) {
    echo '<div class="errors" style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">';
    echo '<strong>Por favor, corrige los siguientes errores:</strong><br>';
    foreach ($errors as $error) {
        echo htmlspecialchars($error) . '<br>';
    }
    echo '</div>';
}
?>

<h2>Editar Usuario (ID: <?= htmlspecialchars($user_id) ?>)</h2>

<form action="edit_user.php" method="POST">
    
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
    
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
    </div>
    <div>
        <label for="password">Nueva Contraseña:</label>
        <input type="password" id="password" name="password">
        <small>(Dejar en blanco para no cambiar la contraseña actual)</small>
    </div>
    
    <button type="submit">Actualizar Usuario</button>
    <a href="dashboard.php" style="margin-left: 10px;">Cancelar</a>
</form>

<?php
// 7. Cargar el pie de página
require __DIR__ . '/views/partials/footer.php';
?>