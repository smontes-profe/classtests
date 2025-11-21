<?php

require 'bootstrapAct3.php';

$empleados = [];
$error_busqueda = null;
$nombre_buscado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {

    $nombre_buscado = trim($_POST['nombre']);

    try {
        $config = Config\DatabaseAct3::getAll();
        $connection = new Database\ConnectionAct3($config);
        $pdo = $connection->getConnection(); 

        $builder = new Database\QueryBuilder($pdo);

        $empleados = $builder->whereNombreLike($nombre_buscado)
                             ->get();
    } catch (\Exception $e) {
        $error_busqueda = "Error en la operación: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Empleado (Actividad 3)</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Buscar Empleado por Nombre</h1>

        <?php if ($error_busqueda): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_busqueda); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Empleado:</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?php echo htmlspecialchars($nombre_buscado); ?>"
                    class="form-control"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php
        // Mostrar resultados solo si se ha enviado el formulario usando el método POST y no hay error
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error_busqueda):
        ?>
            <h2 class="mt-5">Resultados de la búsqueda para "<?php echo htmlspecialchars($nombre_buscado); ?>"</h2>

            <?php if (count($empleados) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Salario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($empleados as $empleado): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                                <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                                <td><?php echo htmlspecialchars($empleado['salario']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    No se encontraron empleados con ese nombre.
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>

</html>