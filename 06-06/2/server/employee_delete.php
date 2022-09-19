<?php
require_once("./db.php");


if (!isset($_GET['id'])) {
    die("Employee Delete Request has a error: NO ID");
}

$id = $_GET['id'];

$delete_employee_sql = "DELETE FROM employee WHERE id='$id'";

mysqli_query($conn, $delete_employee_sql);
