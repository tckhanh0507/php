<?php
require "connect.php";

if (!function_exists('getData'))
{
    function getData()
    {
        require "connect.php";
        $result = $conn->query("select * from tbl_product");
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }

    }
}


if (!function_exists('GetByID'))
{
    function GetByID($id)
    {
        require "connect.php";
        $result = $conn->query("select * from tbl_product where id = ' $id'");
        if (mysqli_num_rows($result) > 0) {
            return $result[0];
        }
        return null;
    }
}




