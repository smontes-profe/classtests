<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ejercicio 1</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
</head>

<body class="bg-light">
    <header class="py-4 mb-4 bg-white border-bottom">
        <div class="container">
            <h1 class="h3 mb-0">Redirección HTTP2</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <form method="GET" class="row g-3">
                                <div class="col-12">
                                    <label for="centro" class="form-label">Centro</label>
                                    <input type="text" name="centro" id="centro" class="form-control" value="<?php echo htmlspecialchars($centro); ?>" placeholder="Escribe 'ilerna'">
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                        
                        <div>
                            <?php if ($centro !== "" && $centro !== "ilerna"): ?>
                                <p class="alert alert-warning" role="alert">
                                    Booooo! Fueraaaa!!!
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
    </main>

    <footer class="mt-5 py-4 bg-white border-top">
        <div class="container text-center small text-muted">
            &copy; <?php echo date('Y'); ?> Ejercicio 1
        </div>
    </footer>

</body>

</html>