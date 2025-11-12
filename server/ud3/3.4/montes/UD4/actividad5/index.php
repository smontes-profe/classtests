<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Aplicación CRUD</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: #ffffff;
            padding: 2em 3em;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav li {
            margin: 15px 0;
        }
        nav a {
            display: block;
            padding: 15px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        nav a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        /* Colores distintos para cada acción */
        nav a.gestion { background-color: #007bff; }
        nav a.gestion:hover { background-color: #0056b3; }
        
        nav a.buscar { background-color: #17a2b8; }
        nav a.buscar:hover { background-color: #117a8b; }

        nav a.registrar { background-color: #28a745; }
        nav a.registrar:hover { background-color: #1e7e34; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Menú Principal</h1>
        <nav>
            <ul>
                <li>
                    <a href="lista.php" class="gestion">
                        ➡️ Gestionar Empleados (Listar, Editar, Eliminar)
                    </a>
                </li>
                <li>
                    <a href="buscar_empleado.php" class="buscar">
                        🔎 Buscar Empleado
                    </a>
                </li>
                <li>
                    <a href="nuevo_usuario.php" class="registrar">
                        👤 Registrar Nuevo Usuario
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</body>
</html>