<?php

require_once "db.php";
require_once "employee.php";
require_once "genderdao.php";

class EmployeeDao
{
    public static function getById($id)
    {
        $conn = CommonDao::getConnection();
        $sql = "SELECT * FROM employee WHERE id='$id'";
        $result = $conn->query($sql);

        //return false if there is no employee by the given ID
        if ($result->num_rows == 0) {
            return false;
        }

        $row = $result->fetch_assoc();
        $gender = GenderDao::getByID($row['gender_id']);

        $employee = new Employee();
        $employee->setId($row['id']);
        $employee->setName($row['name']);
        $employee->setAge($row['age']);
        $employee->setGender($gender);

        return $employee;
    }

    public static function getAll()
    {
        $conn = CommonDao::getConnection();
        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);

        // return false if there is no records in the database
        if ($result->num_rows == 0) {
            return false;
        }

        $employeeList = [];

        while ($row = $result->fetch_assoc()) {
            $gender = GenderDao::getByID($row['gender_id']);

            $employee = new Employee();
            $employee->setId($row['id']);
            $employee->setName($row['name']);
            $employee->setAge($row['age']);
            $employee->setGender($gender);

            array_push($employeeList, $employee);
        }

        return $employeeList;
    }
}
