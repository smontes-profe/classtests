<?php
require_once __DIR__ . '/../actividad1/conexion.php';

$id = $_GET['id'] ?? null;
if(!$id){ exit("falta id"); }

$st = $pdo->prepare("SELECT * FROM empleados WHERE id=?");
$st->execute([$id]);
$r = $st->fetch();

if(!$r){ exit("empleado no existe"); }

if($_POST){
    $n = $_POST['nombre'];
    $s = $_POST['salario'];

    $pdo->prepare("UPDATE empleados SET nombre=?, salario=? WHERE id=?")
        ->execute([$n,$s,$id]);

    header("Location: lista.php");
    exit;
}
?>
<h1>Editar empleado</h1>
<form method="post">
    <input name="nombre"  value="<?= htmlspecialchars($r['nombre']) ?>">
    <input name="salario" value="<?= $r['salario'] ?>">
    <button>guardar</button>
</form>
