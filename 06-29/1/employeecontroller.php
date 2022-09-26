<?php

require_once "employeedao.php";

// check whether the keys have values or not 
$hasName = !empty($_GET['name']);
$hasGender = !empty($_GET['gender']);


$employees = array();

if ($hasName) {
    $name = $_GET['name'];
}

if ($hasGender) {
    $gender = $_GET['gender'];
}

// if there is no search
if (!$hasName && !$hasGender) $employees = EmployeeDao::getAll();

// if search by name
if ($hasName && !$hasGender) $employees = EmployeeDao::getByName($name);

// if search by gender
if (!$hasName && $hasGender) $employees = EmployeeDao::getByGender($gender);

// if search by name and gender
if ($hasName && $hasGender) $employees = EmployeeDao::getByNameAndGender($name, $gender);


echo (json_encode($employees));
