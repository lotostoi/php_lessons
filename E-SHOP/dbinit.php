<?php

// класс генерирующий запросы к базе данных

class QueryToMysqli
{
    function incPole($id, $db, $pole)
    {
        return  "UPDATE $db SET $pole = $pole + 1 WHERE id ='$id'";
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
    function select($pole, $db)
    { 
        return  "SELECT $pole FROM $db";
    }
    function select_id($id, $pole, $db)
    {
        return  "SELECT $pole FROM $db WHERE id = $id";
    }
    function sort_max_min($db, $pole)
    {
        return  "SELECT * FROM $db ORDER BY $pole DESC" ;
    }
    function selectAll($db)
    {
        return  "SELECT * FROM $db " ;
    }
    function createDB($db)
    {
        return  "CREATE DATABASE $db" ;
    }
    function deleteDB($db)
    {
        return  "DROP DATABASE $db" ;
    }
    function deleteTable($db)
    {
        return  "DROP TABLE $db" ;
    }
}

$query = new QueryToMysqli;

?>