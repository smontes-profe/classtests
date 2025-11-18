<?php
/**
 * Controlador de Login.
 *
 * Muestra el formulario (GET) o procesa la autenticación (POST).
 * Aplica validación, password_verify() y gestión de sesiones.
 */

// 1. Cargar dependencias
require_once __DIR__ . '/includes/db.php';
// Cargamos el header.php (que incluye funciones.php y startSecureSession())
require_once __DIR__ . '/views/partials/header.php';

// 2. Inicializar variables
$errors = [];
$email = '';

// 3. Comprobar si el formulario ha sido enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- INICIO DE VALIDACIÓN Y SEGURIDAD ---

    // 3.1. Sanear entradas (función de 'funciones.php')
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? ''; // La contraseña no se sanea

    // 3.2. Validación simple
    if (empty($email)) {
        $errors[] = "El email es obligatorio.";
    }
    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria.";
    }

    // 3.3. Si la validación básica pasa, intentar autenticar
    if (empty($errors)) {
        
        try {
            // --- Consulta Preparada (REQUISITO) ---
            // Buscamos al usuario por su email
            $sql = "SELECT id, nombre, email, password FROM usuarios WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            
            $user = $stmt->fetch(); // Obtener el resultado

            // --- Verificación de Contraseña (REQUISITO) ---
            // password_verify() compara la contraseña enviada ($password)
            // con el hash guardado en la BBDD ($user['password']).
            
            if ($user && password_verify($password, $user['password'])) {
                
                // ¡ÉXITO! Contraseña correcta.
                
                // --- Gestión de Sesión (REQUISITO) ---
                // Guardamos los datos del usuario en la sesión.
                // NO guardes la contraseña, ni siquiera el hash.
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nombre'] = $user['nombre'];
                $_SESSION['user_email'] = $user['email'];

                // Redirigir al dashboard (página protegida)
                header('Location: dashboard.php');
                exit; // Detener script

            } else {
                // Email no encontrado o contraseña incorrecta
                $errors[] = "Email o contraseña incorrectos.";
            }

        } catch (PDOException $e) {
            $errors[] = "Error en la base de datos: " . $e->getMessage();
        }
    }
    // --- FIN DEL PROCESAMIENTO POST ---
}

// 4. Mostrar la vista (si es GET o si hay errores en POST)

// 4.1. Mostrar mensaje de éxito si vienes de registrarte
if (isset($_GET['status']) && $_GET['status'] === 'registered') {
    echo '<div class="success" style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px;">';
    echo '¡Registro completado! Por favor, inicia sesión.';
    echo '</div>';
}

// 4.2. Mostrar errores (si los hay)
if (!empty($errors)) {
    echo '<div class="errors" style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">';
    foreach ($errors as $error) {
        echo htmlspecialchars($error) . '<br>';
    }
    echo '</div>';
}

// 4.3. Cargar la vista del formulario
require __DIR__ . '/views/login_form.php';

// 5. Cargar el pie de página
require __DIR__ . '/views/partials/footer.php';
?>