<?php

require "genderdao.php";

require "employeedao.php";

echo ("testing 1 2 3 ....");

// $genderdao = GenderDao::getByID(2);
// $genderdao = GenderDao::getAll();
// var_dump(json_encode($genderdao));


$employee = EmployeeDao::getById(7);
$employees = EmployeeDao::getAll();


var_dump(json_encode($employees));
