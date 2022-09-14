<?php
require_once './db.php';

$_sql_get_all_employees = "SELECT * FROM employee";

$result = mysqli_query($conn, $_sql_get_all_employees);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <h1>All Employees</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($employee = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $employee['id'] ?></td>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['age'] ?></td>
                    <td><?= $employee['gender_id'] == "1" ? "Male" : "Female" ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>