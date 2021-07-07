<?php

const SERVNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'shop_e';
const CART='cart';
const SHOPE = 'shope';
const USERS = 'users';
const COTALOG = 'cotalog';

$link = mysqli_connect(SERVNAME, USERNAME, PASSWORD, DBNAME) or die("Error - 404");





// класс генерирующий запросы к базе данных

class QueryToMysqli
{
    function incPole($id, $db, $pole)
    {
        return  "UPDATE $db SET $pole = $pole + 1 WHERE id ='$id'";
    }
    function decPole($id, $db, $pole)
    {
        return  "UPDATE $db SET $pole = $pole - 1 WHERE id ='$id'";
    }
    function inc_pole_pole($pole_key, $valPole, $db, $pole)
    {
        return  "UPDATE $db SET $pole = $pole + 1 WHERE $pole_key ='$valPole'";
    }
    function dellAll($db)
    {
        return  "DELETE FROM $db";
    }
    function dellOneRow($id, $db)
    {
        return  "DELETE FROM $db WHERE id = $id ";
    }
    function addOneRow($db, $arg1, $arg2, $arg3, $arg4, $arg5, $arg6)
    {
        return  "INSERT INTO $db VALUES ('$arg1', '$arg2','$arg3' , '$arg4', '$arg5', '$arg6' )";
    }
    function addOneRow_4($db, $arg1, $arg2, $arg3, $arg4)
    {
        return  "INSERT INTO $db VALUES ('$arg1', '$arg2','$arg3' , '$arg4')";
    }
    function addOneRow_5($db, $arg1, $arg2, $arg3, $arg4, $arg5)
    {
        return  "INSERT INTO $db VALUES ('$arg1', '$arg2','$arg3' , '$arg4', '$arg5')";
    }
    function select($pole, $db)
    {
        return  "SELECT $pole FROM $db";
    }
    function select_id($id, $pole, $db)
    {
        return  "SELECT $pole FROM $db WHERE id = $id";
    }
    function select_row_id($id, $db)
    {
        return  "SELECT * FROM $db WHERE id = $id";
    }
    function select_row($db, $pole, $val_pole)
    {
        return  "SELECT * FROM $db WHERE $pole = $val_pole";
    }
    function sort_max_min($db, $pole)
    {
        return  "SELECT * FROM $db ORDER BY $pole DESC";
    }
    function selectAll($db)
    {
        return  "SELECT * FROM $db ";
    }
    function createDB($db)
    {
        return  "CREATE DATABASE $db";
    }
    function deleteDB($db)
    {
        return  "DROP DATABASE $db";
    }
    function deleteTable($db)
    {
        return  "DROP TABLE $db";
    }
}

$query = new QueryToMysqli;



function getArr($link, $db)
{
    $res = mysqli_query($link, $GLOBALS['query'] -> selectAll($db));
    if (!$res) die("Error - ." . mysqli_error($link));
    $i=0;
    While ($content = mysqli_fetch_assoc($res)) {
        $arr[$i++] = $content;
    }
    return $arr;
}
function getArrPole($link, $db,$pole)
{
    $res = mysqli_query($link, $GLOBALS['query'] -> selectAll($db));
    if (!$res) die("Error - ." . mysqli_error($link));
    $i=0;
    While ($content = mysqli_fetch_assoc($res)) {
        $arr[$i++] = $content["$pole"];
    }
    return $arr;
}
