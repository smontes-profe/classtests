<?php
// Mostrar errores (útil para depurar)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la config
require_once 'config.php';

// Preparamos las variables que vamos a usar
$empleado = null; // Para guardar los datos del empleado a editar
$error = '';
$mensaje = '';
$id = 0; // El ID del empleado que estamos editando

try {
    // 1. Conectar a la BBDD
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Miramos si el usuario ha enviado el formulario (POST) o si viene de la lista (GET)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // --- LÓGICA DEL POST: El usuario ha pulsado "Actualizar" ---

        // Recogemos los datos del formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $puesto = $_POST['puesto'];
        $salario = $_POST['salario'];

        // Validación simple
        if (empty($id) || empty($nombre) || empty($puesto) || empty($salario)) {
            $error = "Todos los campos son obligatorios.";
        } else {
            // Si los datos están bien, preparamos la consulta UPDATE
            $sql_update = "UPDATE empleados 
                           SET nombre = :nombre, puesto = :puesto, salario = :salario 
                           WHERE id = :id";
            $stmt_update = $pdo->prepare($sql_update);

            // Vinculamos los datos (seguridad, previene inyección SQL)
            $stmt_update->bindParam(':nombre', $nombre);
            $stmt_update->bindParam(':puesto', $puesto);
            $stmt_update->bindParam(':salario', $salario);
            $stmt_update->bindParam(':id', $id, PDO::PARAM_INT); // Le decimos a PDO que el ID es un número

            // Ejecutamos la actualización
            $stmt_update->execute();
            $mensaje = "¡Empleado actualizado con éxito!";
        }
    } elseif (isset($_GET['id'])) {
        // --- LÓGICA DEL GET: El usuario viene del listado (lista.php) ---
        // Solo necesitamos coger el ID de la URL
        $id = $_GET['id'];
    } else {
        // Si no hay ID por GET ni por POST, no sabemos qué editar. Volvemos a la lista.
        header("Location: lista.php");
        exit; // Paramos el script
    }

    // 3. OBTENER DATOS DEL EMPLEADO (PARA MOSTRAR EN EL FORMULARIO)
    // (Este SELECT se ejecuta tanto en GET como en POST para tener los datos frescos)
    $sql_select = "SELECT * FROM empleados WHERE id = :id";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_select->execute();

    // Guardamos los datos del empleado en la variable
    $empleado = $stmt_select->fetch(PDO::FETCH_ASSOC);

    // Si el ID no existe, $empleado estará vacío (false)
    if (!$empleado) {
        $error = "Empleado no encontrado.";
        $id = 0; // Limpiamos el ID para que no se muestre el formulario
    }
} catch (PDOException $e) {
    // Capturamos cualquier error de la BBDD
    $error = "Error de base de datos: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad 5: Editar Empleado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Actividad 5: Editar Empleado</h2>
        <p><a href="lista.php">&larr; Volver al listado</a></p>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if ($mensaje): ?>
            <p class="success"><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>
        <?php if ($empleado): ?>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($empleado['id']) ?>">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>">
                </div>
                <div>
                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto" value="<?= htmlspecialchars($empleado['puesto']) ?>">
                </div>
                <div>
                    <label for="salario">Salario:</label>
                    <input type="number" step="0.01" id="salario" name="salario" value="<?= htmlspecialchars($empleado['salario']) ?>">
                </div>
                <div>
                    <input type="submit" value="Actualizar Empleado">
                </div>
            </form>
        <?php else: ?>
            <p>No se pueden mostrar los datos del empleado.</p>
        <?php endif; ?>
    </div>
</body>

</html>