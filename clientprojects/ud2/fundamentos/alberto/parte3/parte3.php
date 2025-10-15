<?php 
    $name = isset($_GET['name']) ? $_GET['name'] : ""; 
    $surname1 = isset($_GET['surname1']) ? $_GET['surname1'] : ""; 
    $surname2 = isset($_GET['surname2']) ? $_GET['surname2'] : ""; 
    $email = isset($_GET['email']) ? $_GET['email'] : ""; 
    $birthYear = isset($_GET['birthYear']) ? $_GET['birthYear'] : ""; 
    $phoneNumber = isset($_GET['phoneNumber']) ? $_GET['phoneNumber'] : ""; 
?>
<?php if($name || $surname1 || $surname2 || $email || $birthYear || $phoneNumber) : ?>
    <h3>Submitted data</h3>
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


 <!-- all stye copied completely from Chatgpt-->
<style>
    h3 {
        color: #007bff;
        margin-top: 30px;
        margin-bottom: 15px;
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        max-width: 600px;
        border-collapse: collapse;
        margin-bottom: 30px;
        font-family: Arial, sans-serif;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f1f7ff;
    }

    p {
        font-family: Arial, sans-serif;
        color: #555;
        font-size: 16px;
        margin-top: 20px;
    }
</style>
