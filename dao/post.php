<?php
require_once("./connectProvider.php");
class postDAO
{
    function insert($ten_loai)
    {
        $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
        pdo_execute($sql, $ten_loai);
    }
}