<?php
$centro = $_GET['centro'] ?? '';

if ($centro === 'Ilerna') {
    header('Location: https://ilerna.es');
    exit; 
} else {
    echo "<h3>Booooo! Fueraaaa!!!</h3>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- chatgpt me dio el siguiente codigo
 ,al menos me sirve para aprender y replicarlo en un futuro-->
 <br><p>Copia el siguiente codigo al final de la url actual para acceder</p>
<div class="code-block">
  <pre><code>?centro=Ilerna</code></pre>
  <button class="copy-btn">Copiar</button>
</div>

<style>
.code-block {
  position: relative;
  background: #a3a3a3ff;
  border-radius: 6px;
  padding: 1em;
  font-family: monospace;
  width: 200px;
}

.copy-btn {
  position: absolute;
  top: 0.5em;
  right: 0.5em;
  background: #ddd;
  border: none;
  padding: 0.3em 0.6em;
  border-radius: 3px;
  cursor: pointer;
}

.copy-btn:hover {
  background: #ccc;
}
</style>

<script>
document.querySelectorAll('.copy-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const code = btn.previousElementSibling.innerText;
    navigator.clipboard.writeText(code);
    btn.textContent = 'Copiado!';
    setTimeout(() => btn.textContent = 'Copiar', 1000);
  });
});
</script>
</body>
</html>
