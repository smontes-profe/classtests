<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Parte 4</title>
</head>
<body>
<?php

// Read the 'age' parameter and validate

$age = isset($_GET['edad']) ? intval($_GET['edad']) : null;
$currentYear = date("Y");

$ageMinus10 = $age - 10;
$agePlus10 = $age + 10;

$yearMinus10 = $currentYear - 10;
$yearPlus10 = $currentYear + 10;

$retirementYear = $currentYear + (67 - $age);

echo "<p>Edad actual: $age años.</p>";
echo "<p>Hace 10 años tenía: $ageMinus10 años. Año: $yearMinus10.</p>";
echo "<p>Dentro de 10 años tendrá: $agePlus10 años. Año: $yearPlus10.</p>";
echo "<p>Año de jubilación (a los 67 años): $retirementYear.</p>";

?>
</body>
</html>