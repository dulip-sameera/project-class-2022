<?php
require_once('./db.php');

if (!(isset($_POST['name']) &&
    isset($_POST['age']) &&
    isset($_POST['gender']))) {
    die("Some data fields are empty");
}
$emp_name = trim($_POST['name']);
$emp_age = trim($_POST['age']);
$emp_gender = trim($_POST['gender']);



$add_employee_sql = "INSERT INTO employee(name, age, gender_id) VALUES ('$emp_name', $emp_age, $emp_gender);";


mysqli_query($conn, $add_employee_sql);
