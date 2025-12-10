<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nivelGoku = 1000;
$diasEntranamiento = rand(1, 10);

$nivelTotal = 0;
$diasTotales = 0;

$entrenamientos = ['Combate', 'Meditación', 'Vuelo', 'Sala de tiempo'];

if (isset($_GET['nivelGoku'])) {
    $nivelGoku = max(0, (int)$_GET['nivelGoku']);
}

if (isset($_GET['diasEntrenamiento'])) {
    $tmp = (int)$_GET['diasEntrenamiento'];
    $diasEntranamiento = ($tmp > 0 && $tmp < 11) ? $tmp : rand(1, 10);
}

$nivelesDia = [];
$nivelTotal = $nivelGoku;
$diasTotales = 0;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['nivelGoku']) || isset($_GET['diasEntrenamiento']))) {

    $nivelPrevio = isset($_GET['nivelTotal']) ? (float)$_GET['nivelTotal'] : $nivelGoku;
    $diasPrevios = isset($_GET['diasTotales']) ? (int)$_GET['diasTotales'] : 0;

    $diasTotales = $diasPrevios + $diasEntranamiento;

    $tipoEntrenamiento = isset($_GET['entrenamientos']) ? $_GET['entrenamientos'] : 'Combate';

    function entrenar($nivel, $tipo)
    {
        switch ($tipo) {
            case "Combate":
                $nivel += 1000;
                break;
            case "Meditación":
                $nivel += 300;
                break;
            case "Vuelo":
                $nivel += 200;
                break;
            case "Sala de tiempo":
                $nivel *= 1.5;
                break;
            default:
                break;
        }
        return $nivel;
    }

    $nivelActual = $nivelPrevio;

    $mejorasEspeciales = rand(0,1) == 0 ? 'par' : 'impar';
    $itsOver9000 = false;

    for ($i = 1; $i <= $diasEntranamiento; $i++) {
        $diaGlobal = $diasPrevios + $i;

        if (($mejorasEspeciales == 'par' && $diaGlobal % 2 == 0) || ($mejorasEspeciales == 'impar' && $diaGlobal % 2 == 1)) {
            $nivelActual *= 1.5;
            $mensajeTocho = "KAIO KEN x1.5 ACTIVADO!!";
        } else {
            $mensajeTocho = "";
        }

        $nivelActual = entrenar($nivelActual, $tipoEntrenamiento);

        if (!$itsOver9000 && $nivelActual > 9000) {
            $itsOver9000 = true;
            $mensaje9000 = "IT´S OVER 9.000!!!!";
        } else {
            $mensaje9000 = "";
        }

        $nivelesDia[] = [
            'nivel' => $nivelActual,
            'tocho' => $mensajeTocho,
            'over9000' => $mensaje9000
        ];
    }

    $nivelTotal = $nivelActual;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bola de dragón</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5">

<div class="row mb-5">
    <div class="col-md-6 offset-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-4">Entrena a Goku</h3>
                <form method='GET'>
                    <div class="mb-3">
                        <label class="form-label">Nivel de poder</label>
                        <input type="number" class="form-control" name="nivelGoku" value="<?php echo $nivelGoku; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Días de entrenamiento: <span id="valorActual"><?php echo $diasEntranamiento; ?></span></label>
                        <input type="range" class="form-range" name="diasEntrenamiento" min="1" max="10" value="<?php echo $diasEntranamiento; ?>" oninput="document.getElementById('valorActual').textContent=this.value">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Entrenamientos</label>
                        <select class="form-select" name="entrenamientos">
                            <?php foreach ($entrenamientos as $value): ?>
                                <option value="<?php echo $value; ?>" <?php if(isset($tipoEntrenamiento) && $tipoEntrenamiento==$value) echo 'selected'; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="diasTotales" value="<?php echo $diasTotales; ?>">
                    <input type="hidden" name="nivelTotal" value="<?php echo $nivelTotal; ?>">

                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if(!empty($nivelesDia)): ?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h3 class="mb-3">Historial de entrenamiento</h3>
        <?php
        $inicio = $diasTotales - $diasEntranamiento;
        for($i = $diasEntranamiento - 1; $i >= 0; $i--):
            $dia = $inicio + $i + 1;
        ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Día <?php echo $dia; ?></h5>
                <p class="card-text">Goku ha entrenado y ha alcanzado un nivel de <strong><?php echo number_format($nivelesDia[$i]['nivel']); ?></strong></p>
                <?php if($nivelesDia[$i]['tocho']): ?>
                <p class="text-warning fw-bold"><?php echo $nivelesDia[$i]['tocho']; ?></p>
                <?php endif; ?>
                <?php if($nivelesDia[$i]['over9000']): ?>
                <p class="text-danger fw-bold fs-4"><?php echo $nivelesDia[$i]['over9000']; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php endfor; ?>

        <div class="mt-4">
            <?php
            if ($nivelTotal >= 100000) {
                echo "<p class='alert alert-success'>¡Goku ha alcanzado el Ultra Instinto!</p>";
            } else {
                echo "<p class='alert alert-secondary'>Goku necesita más entrenamiento...</p>";
            }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>

</main>
</body>
</html>
