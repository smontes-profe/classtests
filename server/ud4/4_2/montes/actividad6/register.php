<?php
/**
 * Controlador de Registro.
 *
 * Muestra el formulario (GET) o procesa el registro (POST).
 * Aplica validación, password_hash() y consultas preparadas.
 */

// 1. Cargar dependencias
// db.php carga config.php, y funciones.php se carga en el header
require_once __DIR__ . '/includes/db.php';
// Cargamos el header.php INCLUYE el 'funciones.php' y 'startSecureSession()'
require_once __DIR__ . '/views/partials/header.php';

// 2. Inicializar variables
$errors = []; // Array para almacenar mensajes de error
$nombre = '';
$email = '';

// 3. Comprobar si el formulario ha sido enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // --- INICIO DE VALIDACIÓN Y SEGURIDAD ---

    // 3.1. Sanear entradas (función de 'funciones.php')
    $nombre = sanitizeInput($_POST['nombre'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? ''; // La contraseña no se sanea con htmlspecialchars
    $password_confirm = $_POST['password_confirm'] ?? '';

    // 3.2. Validación de campos
    if (empty($nombre)) {
        $errors[] = "El nombre es obligatorio.";
    }
    if (empty($email)) {
        $errors[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del email no es válido.";
    }
    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }
    if ($password !== $password_confirm) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    // 3.3. Comprobar si el email ya existe (Consulta Preparada)
    if (empty($errors)) {
        try {
            $sql_check = "SELECT id FROM usuarios WHERE email = ?";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([$email]);
            
            if ($stmt_check->fetch()) {
                $errors[] = "El correo electrónico ya está registrado.";
            }

        } catch (PDOException $e) {
            $errors[] = "Error al comprobar el email: " . $e->getMessage();
        }
    }

    // 3.4. Si no hay errores, proceder al registro
    if (empty($errors)) {
        
        // --- Cifrado de Contraseña (REQUISITO) ---
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // --- Inserción con Consulta Preparada (REQUISITO) ---
            $sql_insert = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
            $stmt_insert = $pdo->prepare($sql_insert);
            
            // Ejecutar la inserción
            if ($stmt_insert->execute([$nombre, $email, $hashed_password])) {
                
                // Registro exitoso: Redirigir al Login
                // Usamos un parámetro GET para mostrar un mensaje de éxito
                header('Location: login.php?status=registered');
                exit; // Importante: detener el script después de redirigir

            } else {
                $errors[] = "Error: No se pudo registrar al usuario.";
            }

        } catch (PDOException $e) {
            // Manejar error de BBDD (ej. constraints)
            $errors[] = "Error en la base de datos: " . $e->getMessage();
        }
    }

    // --- FIN DEL PROCESAMIENTO POST ---
}

// 4. Mostrar la vista (si es GET o si hay errores en POST)

// 4.1. Mostrar errores (si los hay)
if (!empty($errors)) {
    echo '<div class="errors" style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">';
    echo '<strong>Por favor, corrige los siguientes errores:</strong><br>';
    foreach ($errors as $error) {
        echo htmlspecialchars($error) . '<br>';
    }
    echo '</div>';
}

// 4.2. Cargar la vista del formulario
// Las variables $nombre y $email (saneadas) se usarán para
// "rellenar" los campos del formulario si hubo un error.
require __DIR__ . '/views/register_form.php';

// 5. Cargar el pie de página
require __DIR__ . '/views/partials/footer.php';
?>