<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de servidor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center py-4 mb-4">
        <h1>Variables de servidor</h1>
    </header>

    <main class="container">
        <ul class="list-group shadow">
            <li class="list-group-item bg-success-subtle border-success"><?php echo $_SERVER['PHP_SELF'] ?></li>
            <li class="list-group-item bg-info-subtle border-info"><?php echo $_SERVER['SERVER_SOFTWARE'] ?></li>
            <li class="list-group-item bg-warning-subtle border-warning"><?php echo $_SERVER['REMOTE_ADDR'] ?></li>
            <li class="list-group-item bg-secondary-subtle border-secondary"><?php echo $_SERVER['REQUEST_METHOD'] ?></li>
            <li class="list-group-item bg-danger-subtle border-danger"><?php echo $_SERVER['HTTP_USER_AGENT'] ?></li>
        </ul>
    </main>

    <footer class="text-center text-muted mt-4 mb-4">
        &copy; 2025 Mi servidor
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

