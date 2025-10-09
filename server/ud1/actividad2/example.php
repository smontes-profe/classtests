<?php
// Mostrar los valores si existen en GET
if(isset($_GET['input1'])) {
    $input1 = $_GET['input1'];
} else {
    $input1 = '';
}
if(isset($_GET['input2'])) {
    $input2 = $_GET['input2'];
} else {
    $input2 = '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario GET Simple</title>
</head>
<body>
  <div class="container">
    <form method="get">
      <label for="input1">Input 1:</label>
      <input type="text" name="input1" value="<?php echo $input1; ?>">
      <label for="input2">Input 2:</label>
      <input type="text" id="input2" name="input2" value="<?php echo $input2; ?>">
      <button type="submit">Enviar</button>
    </form>
    <?php if ($input1 !== '' || $input2 !== ''): ?>
      <div class="result">
        <strong>Valores recibidos:</strong><br>
        Input 1: <?php echo $input1; ?><br>
        Input 2: <?php echo $input2; ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>