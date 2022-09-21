<?php
session_start();
if (!isset($_SESSION['userName'])) {
    include "./login.html";
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegetables</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        td,
        th {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Welcome to Harvest Super</h1>
    <h4>You are login as <?= $_SESSION['userName'] ?></h4>
    <h4>(<a href="logout.php">logout</a>)</h4>

    <h1>Vegetables</h1>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Potato</td>
                <td>220</td>
            </tr>
            <tr>
                <td>Carrot</td>
                <td>420</td>
            </tr>
            <tr>
                <td>Leaks</td>
                <td>320</td>
            </tr>
        </tbody>
    </table>
</body>

</html>