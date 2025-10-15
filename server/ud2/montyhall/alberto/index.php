<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();// We'll use session storage

// Initialize stats if NOT set
if (!isset($_SESSION['stay_wins'])) $_SESSION['stay_wins'] = 0;
if (!isset($_SESSION['switch_wins'])) $_SESSION['switch_wins'] = 0;

// Ge the  player's chosen door and switch decision.
$doorChosen = isset($_GET['doorchosen']) ? (int)$_GET['doorchosen'] : 0;
$switch = isset($_GET['switch']) ? (int)$_GET['switch'] : null;

$winningDoor = rand(1,3);

function openGoatDoor($doorChosen, $winningDoor) {
    $doors = [1,2,3];
    $possible = array_diff($doors, [$doorChosen, $winningDoor]);
    return $possible[array_rand($possible)];
}

// If the player's chosen a door and hasn’t decided whether to switch, pick a goat door; otherwise, set it to 0.
$goatDoor = ($doorChosen && is_null($switch)) ? openGoatDoor($doorChosen, $winningDoor) : 0;

// final choice after switch/stay
$finalChoice = null;
$gameResult = '';
if (!is_null($switch) && $doorChosen) {
    $finalChoice = $switch ? array_values(array_diff([1,2,3], [$doorChosen, $goatDoor]))[0] : $doorChosen;
    if ($finalChoice == $winningDoor) {
        $gameResult = 'win';
        if ($switch) $_SESSION['switch_wins']++;
        else $_SESSION['stay_wins']++;
    } else {
        $gameResult = 'lose';
    }
}

//  Stats, percentage calculation
$totalStay = $_SESSION['stay_wins'] + max(0,$_SESSION['stay_wins']+$_SESSION['switch_wins']-$_SESSION['switch_wins']);
$totalSwitch = $_SESSION['switch_wins'] + max(0,$_SESSION['stay_wins']+$_SESSION['switch_wins']-$_SESSION['stay_wins']);
$stayRate = $_SESSION['stay_wins'] ? round(($_SESSION['stay_wins'] / max(1,$totalStay))*100,2) : 0;
$switchRate = $_SESSION['switch_wins'] ? round(($_SESSION['switch_wins'] / max(1,$totalSwitch))*100,2) : 0;

$doors = [1,2,3];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monty Hall</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
    
<h1>Monty Hall Simulation</h1>

<?php if(!$doorChosen): ?>
    <p>Choose a door:</p>
   
    <div class="doors">
        <?php foreach($doors as $d): ?>
        <!-- Looped element creation -->
            <a class="doorcard" href="?doorchosen=<?= $d ?>">
                <img src="img/door.png" alt="Door <?= $d ?>">
                <p>Door <?= $d ?></p>
            </a>
        <?php endforeach; ?>
    </div>

    <?php elseif(is_null($switch)): ?>
        <p>You chose door <?= $doorChosen ?>.</p>
        <p>We open door <?= $goatDoor ?> and there's a goat!</p>
        <p>Do you want to stay or switch?</p>
        <a class="btn" href="?doorchosen=<?= $doorChosen ?>&switch=0">Stay</a>
        <a class="btn" href="?doorchosen=<?= $doorChosen ?>&switch=1">Switch</a>

    <?php else: ?>
        <p>You chose door <?= $doorChosen ?> and <?= $switch ? 'switched' : 'stayed' ?>.</p>
        <p>The winning door is <?= $winningDoor ?>: 
        
        <?php if($winningDoor == $finalChoice): ?>
            <p>You won a car! 🎉</p>
        <?php else: ?>
            <p>It's a goat 😢</p>
        <?php endif; ?>
        </p>

        <div class="doors">
        
        <?php foreach($doors as $d): ?>
            <div class="doorcard">
                <?php if($d == $winningDoor): ?>
                    <img src="img/car.png" alt="Car">
                <?php else: ?>
                    <img src="img/goat.png" alt="Goat">
                <?php endif; ?>
                <p>Door <?= $d ?></p>
            </div>
        <?php endforeach; ?>

        </div>
            <a class="btn" href="index.php">Play again</a>
    <?php endif; ?>

<div class="stats">
    <h3>Statistics:</h3>
    <p>Stay Wins: <?= $_SESSION['stay_wins'] ?> (<?= $stayRate ?>%)</p>
    <p>Switch Wins: <?= $_SESSION['switch_wins'] ?> (<?= $switchRate ?>%)</p>
</div>

</body>
</html>
