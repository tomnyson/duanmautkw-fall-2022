<?php
include("./config.php");

function connect()
{
    try {
        $connectString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "";
        $conn = new PDO($connectString, DB_USERNAME, DB_PASSWORD);
        return $conn;
    } catch (Exception $e) {
        die('connect mysql failed');
    }
}