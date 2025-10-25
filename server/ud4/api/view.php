<?php
//retrieve the list of cars
require_once "pdo.php"; 
$carsHTML='<table class="table table-bordered border-primary">
    <thead class="bg-info text-white"><tr><td>Make</td><td>Mileage</td>
    <td>Year</td></tr></thead><tbody>';
$stmt = $pdo->query("SELECT * FROM  productos");
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $carsHTML.="<tr><td>".htmlentities($row["nombre"])."</td><td>"
    .htmlentities($row["precio"])."</td><td>".
    htmlentities($row["stock"])."</td></tr>";
}
$carsHTML.="</tbody></table>"
?>
<!DOCTYPE html>
<html>
<head>
<title>Sergio Montes Repiso - Autos DB main</title>
</head>
<body>
    <div class="container">
        <h1>Tracking Autos for <?php echo(htmlentities($_SESSION['who'])); ?></h1>
        <?php
            if (isset($_SESSION["success"])) {
                echo('<p style="color: green;">'.htmlentities($_SESSION["success"])."</p>\n");
                unset($_SESSION["success"]);
            }
        ?>
        <h2>Automobiles</h2>
        <?php echo($carsHTML); ?>
        <p>
        <a href="add.php">Add New</a> |
        <a href="logout.php">Logout</a>
        </p>
    </div>
</body>
</html>
