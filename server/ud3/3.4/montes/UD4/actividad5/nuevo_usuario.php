<?php
/**
 * =================================================================
 * CONTROLADOR: nuevo_usuario.php
 * =================================================================
 *
 * Responsabilidades:
 * 1. Incluir la conexión.
 * 2. Preparar variables para la vista ($error, $success, etc.).
 * 3. Si es POST:
 * a. Validar datos (no vacíos, email válido).
 * b. Comprobar si el email ya existe.
 * c. Hashear la contraseña.
 * d. Insertar en la BBDD con bindValue().
 * 4. Cargar la vista.
 */

// 1. Incluir la conexión
require_once __DIR__ . '/conexion.php';

// 2. Preparar variables para la vista
$error = null;
$success = null;
// Variables para repoblar el formulario en caso de error
$nombre_usuario = '';
$email = '';


// 3. Lógica de negocio (procesar el formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recoger y limpiar datos
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? ''; // La contraseña no se trimea

    try {
        // --- a. Validación ---
        if (empty($nombre_usuario) || empty($email) || empty($password)) {
            throw new Exception("Todos los campos son obligatorios.");
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El formato del email no es válido.");
        }

        // --- b. Comprobar si el email ya existe (Preventivo) ---
        $pdo = getConnection();
        
        $sql_check = "SELECT id FROM usuarios WHERE email = :email";
        $stmt_check = $pdo->prepare($sql_check);
        
        // Usamos bindValue() como pide el ejercicio:
        // bindValue() vincula el VALOR de la variable en este momento.
        $stmt_check->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt_check->execute();

        if ($stmt_check->fetch()) {
            throw new Exception("El email introducido ya está registrado.");
        }

        // --- c. Hashear la contraseña ---
        // PASSWORD_DEFAULT usa el algoritmo más seguro disponible (Bcrypt o Argon2)
        // y gestiona el 'salt' automáticamente.
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        if ($password_hash === false) {
            throw new Exception("No se pudo hashear la contraseña.");
        }

        // --- d. Insertar en la BBDD ---
        $sql_insert = "INSERT INTO usuarios (nombre_usuario, email, password) 
                       VALUES (:nombre, :email, :pass)";
        
        $stmt_insert = $pdo->prepare($sql_insert);
        
        // Vinculamos con bindValue()
        $stmt_insert->bindValue(':nombre', $nombre_usuario, PDO::PARAM_STR);
        $stmt_insert->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt_insert->bindValue(':pass', $password_hash, PDO::PARAM_STR);
        
        $stmt_insert->execute();

        // Éxito
        $success = "¡Usuario registrado con éxito!";
        // Limpiamos los campos para un nuevo registro
        $nombre_usuario = '';
        $email = '';
        
    } catch (PDOException $e) {
        // Captura de error de BBDD (ej. duplicado por el 'UNIQUE')
        if ($e->getCode() === '23000') {
            $error = "Error: El email o nombre de usuario ya existe (Error BBDD).";
        } else {
            $error = "Error de base de datos: " . $e->getMessage();
        }
    } catch (Exception $e) {
        // Captura de errores de lógica (campos vacíos, email existe, etc.)
        $error = $e->getMessage();
    }
}

/**
 * =================================================================
 * CARGA DE LA VISTA
 * =================================================================
 */
require_once __DIR__ . '/templates/nuevo_usuario_vista.php';