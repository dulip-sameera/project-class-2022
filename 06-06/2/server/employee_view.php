<?php
require_once './db.php';

$_sql_get_all_employees = "SELECT id, name, age, (SELECT name FROM gender WHERE id = gender_id) AS gender FROM employee";

// this sql orders the output based on gender
// $_sql_get_all_employees = "SELECT e.id, e.name, e.age, g.name AS gender  FROM employee e INNER JOIN gender g ON e.gender_id = g.id";

$result = mysqli_query($conn, $_sql_get_all_employees);

$employees = array();

while ($employee = mysqli_fetch_assoc($result)) {
    array_push($employees, $employee);
}

$employees_json = json_encode($employees);

echo $employees_json;
