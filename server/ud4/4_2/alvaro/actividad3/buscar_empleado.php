<?php
// Mostramos errores para ayudarnos a depurar
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluimos la configuración
require_once 'config.php';

// Preparamos las variables que usaremos en el HTML
$resultados = [];
$busqueda_nombre = ''; // Para el "sticky form"
$error_message = '';

// 1. Comprobamos si el formulario se ha enviado
// (!empty significa que existe y no está vacío)
if (!empty($_GET['nombre'])) {

    // Guardamos lo que el usuario ha escrito
    $busqueda_nombre = $_GET['nombre'];
    try {
        // 2. Conexión a la BBDD
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 3. Consulta Preparada (¡la clave de esta actividad!)
        // Usamos un marcador ':nombre' para no poner datos del usuario
        $sql = "SELECT * FROM empleados WHERE nombre LIKE :nombre";
        $stmt = $pdo->prepare($sql);

        // 4. Preparamos el término de búsqueda
        // Añadimos los '%' para que el LIKE busque coincidencias
        $termino_busqueda = "%" . $busqueda_nombre . "%";

        // 5. Vincular el parámetro (¡Paso de seguridad!)
        // Le decimos a PDO que reemplace ':nombre' con el valor de $termino_busqueda
        $stmt->bindParam(':nombre', $termino_busqueda);

        // 6. Ejecutar
        $stmt->execute();

        // 7. Recoger resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Capturamos cualquier error de la base de datos
        $error_message = "Error en la consulta: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad 3: Búsqueda Segura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .empty {
            color: #888;
        }
    </style>
</head>

<body>
    <h2>Actividad 3: Búsqueda Segura de Empleados</h2>
    <form action="buscar_empleado.php" method="GET">
        <label for="nombre">Buscar por nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($busqueda_nombre) ?>">
        <input type="submit" value="Buscar">
    </form>
    <hr>
    <h3>Resultados de la búsqueda:</h3>

    <?php // --- Lógica para mostrar resultados --- 
    ?>

    <?php if ($error_message): ?>
        <p class="error"><?= htmlspecialchars($error_message) ?></p>
    <?php elseif (!empty($busqueda_nombre) && count($resultados) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $empleado): ?>
                    <tr>
                        <td><?= htmlspecialchars($empleado['id']) ?></td>
                        <td><?= htmlspecialchars($empleado['nombre']) ?></td>
                        <td><?= htmlspecialchars($empleado['puesto']) ?></td>
                        <td><?= htmlspecialchars($empleado['salario']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (!empty($busqueda_nombre) && count($resultados) === 0): ?>
        <p class="empty">No se encontraron empleados con el nombre "<?= htmlspecialchars($busqueda_nombre) ?>".</p>
    <?php else: ?>
        <p>Introduce un nombre para buscar.</p>
    <?php endif; ?>
</body>

</html>