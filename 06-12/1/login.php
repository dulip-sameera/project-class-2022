<?php

if (!(isset($_POST['userName']) && isset($_POST['password']))) {
    include "./login.html";
    die();
}

$userName = $_POST['userName'];
$password = $_POST['password'];

if ($userName == "root" && $password == "1234") {
    session_start();
    $_SESSION['userName'] = $userName;
    include "./mainwindow.php";
} else {
    echo "Incorrect user name or password!";
    include "./login.html";
}
