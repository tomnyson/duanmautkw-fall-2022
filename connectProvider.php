<?php
include("./config.php");

function get_connect()
{
    try {
        $connectString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "";
        $conn = new PDO($connectString, DB_USERNAME, DB_PASSWORD);
        var_dump("connect success");
        return $conn;
    } catch (Exception $e) {
        die('connect mysql failed');
    }
}

function pdo_execute($sql, $arr_values)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $connectString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "";
        $conn = new PDO($connectString, DB_USERNAME, DB_PASSWORD);
        $stmt = $conn->prepare($sql);
        return $stmt->execute(get_object_vars($arr_values));
    } catch (PDOException $e) {
        throw $e;
    } finally {
    }
    unset($conn);
}


function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}