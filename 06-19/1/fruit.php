<?php
if (!isset($_COOKIE['userName'])) {
    echo 'Time Out';
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
    <title>Fruits</title>
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
    <h4>You are login as <?= $_COOKIE['userName'] ?></h4>
    <h4>(<a href="logout.php">logout</a>)</h4>

    <h1>Fruits</h1>
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Apple</td>
                <td>220</td>
            </tr>
            <tr>
                <td>Orange</td>
                <td>420</td>
            </tr>
            <tr>
                <td>Mango</td>
                <td>320</td>
            </tr>
        </tbody>
    </table>
</body>

</html>