<?php

class CommonDao
{

    public static function getConnection()
    {

        $hostname = "localhost";
        $username = "root";
        $password = "1234";
        $database = "earth";

        $connection = new mysqli($hostname, $username, $password, $database);

        if (!$connection) {
            die("Connection Failed:" . $connection->connect_error);
        }
    }
}
