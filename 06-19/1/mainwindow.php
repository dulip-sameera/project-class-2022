<?php

if (!(isset($_SESSION['userName']) && time() - $_SESSION['lastActive'] < 10)) {
    echo 'Time Out';
    session_destroy();
    include "./login.html";
    die();
}

$_SESSION['lastActive'] = time();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Window</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        ul {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0;
            justify-content: center;
            align-items: center;
            width: inherit;
        }

        ul li {
            list-style: none;
            width: inherit;
        }
    </style>
</head>

<body>
    <h1>Welcome to Harvest Super</h1>
    <h4>You are login as <?= $_SESSION['userName'] ?></h4>
    <h4>(<a href="logout.php">logout</a>)</h4>
    <ul>
        <li>
            <a href="fruit.php">Fruits</a>
        </li>
        <li>
            <a href="vegetable.php">Vegetables</a>
        </li>
    </ul>
</body>

</html>