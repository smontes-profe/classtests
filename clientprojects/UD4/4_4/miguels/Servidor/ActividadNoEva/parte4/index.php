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

$selIntro   = $_GET['intro']  ?? '';
$selAccion  = $_GET['accion'] ?? '';
$selCierre  = $_GET['cierre'] ?? '';

$customIntro  = trim($_GET['intro_custom']  ?? '');
$customAccion = trim($_GET['accion_custom'] ?? '');
$customCierre = trim($_GET['cierre_custom'] ?? '');

$modoAleatorio = isset($_GET['random']);

$pieza1 = '';
$pieza2 = '';
$pieza3 = '';

if ($modoAleatorio) {
    $pieza1 = $intro[array_rand($intro)];
    $pieza2 = $accion[array_rand($accion)];
    $pieza3 = $cierre[array_rand($cierre)];

    $selIntro  = $pieza1;
    $selAccion = $pieza2;
    $selCierre = $pieza3;

} else {
    $pieza1 = ($customIntro  !== '') ? $customIntro  : $selIntro;
    $pieza2 = ($customAccion !== '') ? $customAccion : $selAccion;
    $pieza3 = ($customCierre !== '') ? $customCierre : $selCierre;
}

$frase = '';
if ($pieza1 !== '' && $pieza2 !== '' && $pieza3 !== '') {
    $frase = htmlspecialchars(trim("$pieza1 $pieza2 $pieza3"), ENT_QUOTES, 'UTF-8');
}

function optionTag(string $value, string $current): string {
    $safe = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    $selected = ($value === $current) ? ' selected' : '';
    return "<option value=\"$safe\"$selected>$safe</option>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Parte 4 · Frases cuñado</title>
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
          <?php foreach ($intro as $op) echo optionTag($op, $selIntro); ?>
        </select><br>
        <input type="text" name="intro_custom" placeholder="(opción personalizada)" value="<?= htmlspecialchars($customIntro, ENT_QUOTES, 'UTF-8') ?>">
      </div>

      <div>
        <label for="accion">Acción / Comentario</label><br>
        <select id="accion" name="accion">
          <?php foreach ($accion as $op) echo optionTag($op, $selAccion); ?>
        </select><br>
        <input type="text" name="accion_custom" placeholder="(opción personalizada)" value="<?= htmlspecialchars($customAccion, ENT_QUOTES, 'UTF-8') ?>">
      </div>

      <div>
        <label for="cierre">Cierre / Consejo</label><br>
        <select id="cierre" name="cierre">
          <?php foreach ($cierre as $op) echo optionTag($op, $selCierre); ?>
        </select><br>
        <input type="text" name="cierre_custom" placeholder="(opción personalizada)" value="<?= htmlspecialchars($customCierre, ENT_QUOTES, 'UTF-8') ?>">
      </div>

      <p>
        <input type="submit" value="Generar frase">
        <button type="submit" name="random" value="1">Frase aleatoria</button>
      </p>
    </form>

    <?php if ($frase): ?>
      <hr>
      <p><strong>Frase generada:</strong> <?= $frase ?></p>
    <?php endif; ?>
  </main>

  <footer></footer>
</body>
</html>
