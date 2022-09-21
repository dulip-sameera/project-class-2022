<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <h4>You are successfully logout.</h4>
    <h1>Come Again</h1>
    <hr>
    <?php
    setcookie('userName', '', time() - 60 * 2);
    include './login.html';
    ?>
</body>

</html>