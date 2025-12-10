<?php
$resultado = null;

if (isset($_GET['lanzar'])) {
    $resultado = rand(1, 6);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Parte 1 · Dado</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body { min-height: 100vh; }
      .dado-img { max-width: 140px; }
    </style>
</head>
<body class="bg-light d-flex align-items-center">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">

        <header class="text-center mb-4">
          <h1 class="fw-semibold">🎲 Simulación de dado</h1>
          <p class="text-muted mb-0">Pulsa el botón para lanzar un dado de 6 caras</p>
        </header>

        <main>
          <div class="card shadow-sm border-0">
            <div class="card-body p-4 text-center">
              <form action="index.php" method="get" class="mb-3">
                <button type="submit" name="lanzar" value="1" class="btn btn-primary btn-lg">
                  Lanzar dado
                </button>
              </form>

              <?php if ($resultado !== null): ?>
                <div class="alert alert-success" role="alert">
                  <h2 class="h4 mb-0">
                    Resultado:
                    <span class="badge bg-success fs-5 align-middle"><?= $resultado ?></span>
                  </h2>
                </div>

                <img
                  src="img/<?= $resultado ?>.jpg"
                  alt="Dado <?= $resultado ?>"
                  class="img-fluid dado-img rounded shadow-sm"
                />
              <?php else: ?>
                <p class="text-muted mb-0">Aún no has lanzado el dado.</p>
              <?php endif; ?>
            </div>
          </div>
        </main>

        <footer class="text-center mt-4">
          <small class="text-muted">Ejemplo PHP · GET · Bootstrap 5</small>
        </footer>

      </div>
    </div>
  </div>
</body>
</html>
