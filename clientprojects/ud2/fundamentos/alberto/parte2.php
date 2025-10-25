<?php 
    $name = isset($_GET['name']) ? $_GET['name'] : ""; 
    $surname1 = isset($_GET['surname1']) ? $_GET['surname1'] : ""; 
    $surname2 = isset($_GET['surname2']) ? $_GET['surname2'] : ""; 
    $email = isset($_GET['email']) ? $_GET['email'] : ""; 
    $birthYear = isset($_GET['birthYear']) ? $_GET['birthYear'] : ""; 
    $phoneNumber = isset($_GET['phoneNumber']) ? $_GET['phoneNumber'] : ""; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2</title>
    
    <!-- all stye copied completely from Chatgpt-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 40px;
            color: #333;
        }
        h3 {
            color: #444;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:last-child td {
            border-bottom: none;
        }
        p {
            color: #777;
        }
    </style>

</head>
<body>
    
<!-- I did this in order to enhance mobility, as Apache automatically generates a directory listing.
    This route will only work if the Ud2Fundamentos directory is placed inside htdocs -->
<button onclick="window.location.href='http://localhost/Ud2Fundamentos/'">Back</button>
    <h3>2. parte2.php: <br>
    Escribe un programa que almacene en variables tu nombre, primer apellido, segundo apellido, email, <br>
    año en el que naciste y móvil. Luego muéstralos por pantalla dentro de una tabla.  //1,5 PUNTOS.</h3>

    <form action="parte2.php" method="get">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name">

        <label for="surname1">Surname1: </label>
        <input type="text" id="surname1" name="surname1">

        <label for="surname2">Surname2: </label>
        <input type="text" id="surname2" name="surname2">

        <label for="email">Email: </label>
        <input type="email" id="email" name="email">

        <label for="birthYear">Year of Birth: </label>
        <input type="number" id="birthYear" name="birthYear">

        <label for="phoneNumber">Phone Number: </label>
        <input type="tel" id="phoneNumber" name="phoneNumber">

        <button type="submit">Submit</button>
    </form>

<?php if($name || $surname1 || $surname2 || $email || $birthYear || $phoneNumber) : ?>
    <h3>Datos recibidos</h3>
    <table>
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
        <tr><td>Name</td><td><?= htmlspecialchars($name) ?></td></tr>
        <tr><td>Surname1</td><td><?= htmlspecialchars($surname1) ?></td></tr>
        <tr><td>Surname2</td><td><?= htmlspecialchars($surname2) ?></td></tr>
        <tr><td>Email</td><td><?= htmlspecialchars($email) ?></td></tr>
        <tr><td>Year of Birth</td><td><?= htmlspecialchars($birthYear) ?></td></tr>
        <tr><td>Phone Number</td><td><?= htmlspecialchars($phoneNumber) ?></td></tr>
    </table>
<?php else : ?>
    <p>Fill the fields</p>
<?php endif; ?>

</body>
</html>

