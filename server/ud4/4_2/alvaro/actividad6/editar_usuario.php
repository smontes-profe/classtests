<?php
// Definimos el título
$titulo_pagina = 'Editar Usuario';

// ¡IMPORTANTE! Le decimos al header que esta página es privada
$pagina_privada = true;

// Incluimos la plantilla de cabecera (conexión, session_start, etc)
require_once 'includes/header.php';

// Preparamos las variables que vamos a usar
$usuario = null; // Para guardar los datos del usuario a editar
$id = 0; // El ID del usuario que estamos editando

try {
    // 1. Conectar a la BBDD
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Miramos si el formulario se ha enviado (POST) o si venimos de la lista (GET)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // --- LÓGICA DEL POST: El usuario ha pulsado "Actualizar" ---

        // Recogemos los datos del formulario
        $id = $_POST['id'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Contraseña (puede venir vacía)

        // 3. Validación de campos
        if (empty($id) || empty($nombre_usuario) || empty($email)) {
            $error = "Nombre y email son obligatorios.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "El formato del email no es válido.";
        } else {

            // 4. Lógica de la contraseña (¡importante!)
            if (!empty($password)) {
                // Si SÍ escribió una: la ciframos y preparamos la consulta CON contraseña
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $sql_update = "UPDATE usuarios 
                               SET nombre_usuario = :nombre, email = :email, password = :pass 
                               WHERE id = :id";
                // Guardamos los parámetros para el execute
                $params = [
                    ':nombre' => $nombre_usuario,
                    ':email' => $email,
                    ':pass' => $hash_password,
                    ':id' => $id
                ];
            } else {
                // Si NO escribió una (campo vacío): preparamos la consulta SIN contraseña
                $sql_update = "UPDATE usuarios 
                               SET nombre_usuario = :nombre, email = :email 
                               WHERE id = :id";
                // Guardamos los parámetros (esta vez sin la pass)
                $params = [
                    ':nombre' => $nombre_usuario,
                    ':email' => $email,
                    ':id' => $id
                ];
            }

            // 5. Ejecutamos la consulta preparada (la que corresponda)
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute($params);
            $mensaje = "¡Usuario actualizado con éxito!";

            // Si el usuario se ha editado a sí mismo, actualizamos el nombre en la sesión
            // (para que se vea el nombre nuevo en el menú de navegación)
            if ($id == $_SESSION['usuario_id']) {
                $_SESSION['usuario_nombre'] = $nombre_usuario;
            }
        }
    } elseif (isset($_GET['id'])) {
        // --- LÓGICA DEL GET: El usuario viene del listado (dashboard.php) ---
        // Solo cogemos el ID de la URL
        $id = $_GET['id'];
    } else {
        // Si no hay ID por POST ni por GET, echamos al usuario al dashboard
        header("Location: dashboard.php");
        exit;
    }

    // 6. OBTENER DATOS PARA MOSTRAR EN EL FORMULARIO
    // (Se ejecuta siempre, para mostrar los datos frescos después de actualizar)
    $sql_select = "SELECT id, nombre_usuario, email FROM usuarios WHERE id = :id";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->execute([':id' => $id]);

    // Guardamos sus datos en la variable $usuario
    $usuario = $stmt_select->fetch(PDO::FETCH_ASSOC);

    // Si $usuario está vacío (false), es que el ID no existía
    if (!$usuario) {
        $error = "Usuario no encontrado.";
    }
} catch (PDOException $e) {
    // Capturamos cualquier error de la BBDD

    // Comprobación especial: El código 23000 es "Clave duplicada" (email repetido)
    // (Esto salta por el 'UNIQUE' que pusimos en la tabla 'usuarios')
    if ($e->getCode() == 23000) {
        $error = "Error: El email introducido ya existe en la base de datos.";
    } else {
        // Para cualquier otro error, mostramos el mensaje genérico
        $error = "Error de base de datos: " . $e->getMessage();
    }
}
?>

<h2>Editar Usuario</h2>
<p><a href="dashboard.php">&larr; Volver al listado</a></p>

<?php if ($mensaje): ?><p class="success"><?= htmlspecialchars($mensaje) ?></p><?php endif; ?>
<?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>

<?php if ($usuario): ?>
    <form action="editar_usuario.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
        <div>
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>">
        </div>
        <div>
            <label for="password">Nueva Contraseña:</label>
            <input type="password" id="password" name="password">
            <small>(Dejar en blanco para no cambiar la contraseña actual)</small>
        </div>
        <div>
            <input type="submit" value="Actualizar Usuario">
        </div>
    </form>
<?php endif; ?>
<?php
require_once 'includes/footer.php';
?>