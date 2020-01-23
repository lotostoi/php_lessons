<?php

// подключаемся к базе данных
$link = mysqli_connect("localhost", "root", "", "images");

if (!$link) die('Ошибка подключения к серверу баз данных.');
   

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
    function addOneRow($id, $name, $links, $size, $quant, $db)
    {
        return  "INSERT INTO $db VALUES ('$id', '$name','$links' , '$size', '$quant')";
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
}

$query = new QueryToMysqli;

?>