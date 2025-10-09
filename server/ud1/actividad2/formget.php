<?php
// Mostrar los valores si existen en GET
$input1 = isset($_GET['input1']) ? htmlspecialchars($_GET['input1']) : '';
$input2 = isset($_GET['input2']) ? htmlspecialchars($_GET['input2']) : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario GET Simple</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; }
    .container { max-width: 400px; margin: 40px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    input, button { margin: 8px 0; padding: 8px; width: 100%; box-sizing: border-box; }
    button { background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    button:hover { background: #0056b3; }
    .result { margin-top: 16px; padding: 10px; background: #e9ecef; border-radius: 4px; }
  </style>
</head>
<body>
  <div class="container">
    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <label for="input1">Input 1:</label>
      <input type="text" id="input1" name="input1" value="<?php echo $input1; ?>">
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
