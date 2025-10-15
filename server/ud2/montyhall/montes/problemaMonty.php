<?php
//! Controlador de Errores
error_reporting(E_ALL);
ini_set("display_errors", 1);

//! Declaración de variables
$doors = [1, 2, 3];
$winnerDoor = rand(1, 3);
$playerChoice = null;
$revealedDoor = null;
$finalMessage = null;
$finalChoice = null;

//! Declaración de las variables estadisticas 
$keep_wins = isset($_GET["keep_wins"]) ? intval($_GET["keep_wins"]) : 0;
$keep_losses = isset($_GET["keep_losses"]) ? intval($_GET["keep_losses"]) : 0;
$change_wins = isset($_GET["change_wins"]) ? intval($_GET["change_wins"]) : 0;
$change_losses = isset($_GET["change_losses"]) ? intval($_GET["change_losses"]) : 0;

//! Llamada a la función y Comprobaciones
setPlayerChoice();

if ($playerChoice !== null) {
    $revealedDoor = revealDoor();
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $winnerDoor = intval($_GET['winning']); // Recuperar la puerta ganadora

    if ($action === 'keep') {
        $finalChoice = $playerChoice;
    } else if ($action === 'change') {
        $remainingDoors = array_diff($doors, [$playerChoice, $revealedDoor]);
        $finalChoice = array_values($remainingDoors)[0];
    }

}

//! Comprobar el resultado 
if ($finalChoice !== null) {
    if ($finalChoice == $winnerDoor) {
        $finalMessage = "🎉 ¡Has ganado el coche! (Puerta $finalChoice)";
    } else {
        $finalMessage = "🐐 Mala suerte, había una cabra en la puerta $finalChoice.";
    }
}

//! Variables estadisticas
if ($finalChoice !== null) {
    $won = ($finalChoice == $winnerDoor);

    if ($action === 'keep') {
        if ($won)
            $keep_wins++;
        else
            $keep_losses++;
    } elseif ($action === 'change') {
        if ($won)
            $change_wins++;
        else
            $change_losses++;
    }
}
//! Funcion para procesar al jugador 
function setPlayerChoice()
{
    global $playerChoice;
    if (isset($_GET['choice'])) {
        $choice = intval($_GET['choice']);
        if ($choice >= 1 && $choice <= 3) {
            $playerChoice = $choice;
        }
    }
}

//! Funcion para pocesar la apertura de una puerta (no ganadora, ni elegida)
function revealDoor()
{
    global $doors, $playerChoice, $winnerDoor;
    $possibleDoor = array_diff($doors, [$playerChoice, $winnerDoor]);   //? Es un XOR entre arrays
    if (empty($possibleDoor)) {
        $possibleDoor = array_diff($doors, [$playerChoice]);
    }

    $possibleDoor = array_values($possibleDoor);
    return $possibleDoor[array_rand($possibleDoor)];
    //? $temp = array_values($possibleDoors);  // [1,3]
    //? $randomKey = array_rand($temp);        // devuelve 0 o 1
    //? return $temp[$randomKey];              // devuelve 1 o 3
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monty Hall</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Super Premio.</h1>
    <?php if ($playerChoice == null): ?>
        <p>Elige una puerta</p>
        <form method="get">
            <input type="hidden" name="keep_wins" value="<?php echo $keep_wins; ?>">
            <input type="hidden" name="keep_losses" value="<?php echo $keep_losses; ?>">
            <input type="hidden" name="change_wins" value="<?php echo $change_wins; ?>">
            <input type="hidden" name="change_losses" value="<?php echo $change_losses; ?>">

            <button type="submit" name="choice" value="1">Primera Puerta</button>
            <button type="submit" name="choice" value="2">Segunda Puerta</button>
            <button type="submit" name="choice" value="3">Tercera Puerta</button>
        </form>
    <?php else: ?>
        <p>Has elegido la puerta número: <?php echo $playerChoice; ?></p>
        <p>El presentador abre la puerta número <?php echo $revealedDoor; ?>, estaba vacía </p>

        <form method="get">
            <!-- Mantener la puerta -->
            <input type="hidden" name="choice" value="<?php echo $playerChoice; ?>">
            <input type="hidden" name="winning" value="<?php echo $winnerDoor; ?>">
            <button type="submit" name="action" value="keep">Mantener mi puerta</button>
            <button type="submit" name="action" value="change">Cambiar de puerta</button>

            <input type="hidden" name="keep_wins" value="<?php echo $keep_wins; ?>">
            <input type="hidden" name="keep_losses" value="<?php echo $keep_losses; ?>">
            <input type="hidden" name="change_wins" value="<?php echo $change_wins; ?>">
            <input type="hidden" name="change_losses" value="<?php echo $change_losses; ?>">
        </form>
    <?php endif; ?>

    <?php if ($finalMessage): ?>
        <p><?php echo $finalMessage; ?></p>
        <a
            href="problemaMonty.php?keep_wins=<?php echo $keep_wins; ?>&keep_losses=<?php echo $keep_losses; ?>&change_wins=<?php echo $change_wins; ?>&change_losses=<?php echo $change_losses; ?>">
            <button type="button">Jugar de Nuevo</button>
        </a>
    <?php endif; ?>

    <h2>Estadísticas</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Victorias</th>
                <th>Derrotas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mantener</td>
                <td><?php echo $keep_wins; ?></td>
                <td><?php echo $keep_losses; ?></td>
                <td><?php echo $keep_wins + $keep_losses; ?></td>
            </tr>
            <tr>
                <td>Cambiar</td>
                <td><?php echo $change_wins; ?></td>
                <td><?php echo $change_losses; ?></td>
                <td><?php echo $change_wins + $change_losses; ?></td>
            </tr>
        </tbody>
    </table>

</body>
<?php ?>

</html>