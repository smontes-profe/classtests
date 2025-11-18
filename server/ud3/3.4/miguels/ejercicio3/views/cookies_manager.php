<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <header class="py-4 mb-4 bg-white border-bottom">
        <div class="container">
            <h1 class="h3 mb-0"> <?= htmlspecialchars($pageTitle) ?> </h1>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="userIlerna" class="form-label">Introduce el usuario</label>
                                    <input type="text" name="userIlerna" id="userIlerna" class="form-control" placeholder="Escribe 'ilerna'">
                                </div>
                                <div class="d-grid"> <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4">
                        <?php
                        if (isset($_POST['userIlerna'])):
                        ?>
                            <p class="alert alert-info" role="alert">
                                <?= htmlspecialchars($message) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="mt-5 py-4 bg-white border-top">
        <div class="container text-center small text-muted">
            &copy; <?= date('Y') ?>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>