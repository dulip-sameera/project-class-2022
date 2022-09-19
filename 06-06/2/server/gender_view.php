<?php

require_once("./db.php");

$_sql_get_all_genders = "SELECT * FROM gender";

$result = mysqli_query($conn, $_sql_get_all_genders);

$genders = array();

while ($gender = mysqli_fetch_assoc($result)) {
    array_push($genders, $gender);
}

$genders_json = json_encode($genders);

echo $genders_json;
