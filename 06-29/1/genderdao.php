<?php

require_once "db.php";
require_once "gender.php";

class GenderDao
{


    public static function getByID($id)
    {
        $conn = CommonDao::getConnection();
        $sql = "SELECT * FROM gender WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $gender = new Gender();
        $gender->setId($row['id']);
        $gender->setName($row['name']);
        return $gender;
    }

    public static function getAll()
    {
        $conn = CommonDao::getConnection();
        $sql = "SELECT * FROM gender";
        $result = $conn->query($sql);
        $genderList = array();
        while ($row = $result->fetch_object()) {
            $gender = new Gender();
            $gender->setId($row->id);
            $gender->setName($row->name);

            array_push($genderList, $gender);
        }

        return $genderList;
    }
}
