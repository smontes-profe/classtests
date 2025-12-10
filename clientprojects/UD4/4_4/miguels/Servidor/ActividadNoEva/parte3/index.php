<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$intro = [
    "Yo en tu lugar…",
    "La verdad es que…",
    "Tú sabes que…",
    "No hay duda de que…",
    "Al final…",
];

$accion = [
    "siempre hay que invertir en…",
    "lo importante es…",
    "nunca subestimes…",
    "yo siempre digo que…",
    "el secreto está en…",
];

$cierre = [
    "la bolsa de valores.",
    "no tener dinero congelado en el banco.",
    "los chemtrails.",
    "la nube.",
    "las criptocoins.",
];

$selIntro  = $_GET['intro']  ?? '';
$selAccion = $_GET['accion'] ?? '';
$selCierre = $_GET['cierre'] ?? '';

$frase = '';
if ($selIntro && $selAccion && $selCierre) {
    $frase = htmlspecialchars(trim("$selIntro $selAccion $selCierre"), ENT_QUOTES, 'UTF-8');
}

function optionTag(string $value): string {
    return "<option value=\"$value\">$value</option>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Parte 3 · Frases cuñado</title>
</head>
<body>
  <header>
    <h1>Constructor de frases “cuñado”</h1>
  </header>

  <main>
    <form action="" method="GET">
      <div>
        <label for="intro">Introducción</label><br>
        <select id="intro" name="intro">
          <?php foreach ($intro as $op) echo optionTag($op); ?>
        </select>
      </div>

      <div>
        <label for="accion">Acción / Comentario</label><br>
        <select id="accion" name="accion">
          <?php foreach ($accion as $op) echo optionTag($op); ?>
        </select>
      </div>

      <div>
        <label for="cierre">Cierre / Consejo</label><br>
        <select id="cierre" name="cierre">
          <?php foreach ($cierre as $op) echo optionTag($op); ?>
        </select>
      </div>

      <p><input type="submit" value="Generar frase"></p>
    </form>

    <?php if ($frase): ?>
      <hr>
      <p><strong>Frase generada:</strong> <?= $frase ?></p>
    <?php endif; ?>
  </main>

  <footer></footer>
</body>
</html>
