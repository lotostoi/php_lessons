<?php


error_reporting(0);

$nametabel = "cotalog";

if (!$link) die('Ошибка подключения к серверу баз данных.');
$list = "";
$products = mysqli_query($link, $query->selectAll($nametabel));
while ($product = mysqli_fetch_assoc($products)) {
    $id = $product['id'];
    $name = $product['name'];
    $path = $product['linkImg'];
    $price = $product['price'];
    $text = $product['description'];

    $list .=  "<a href='E-Shop.php?page=$id&name=$name&link=$path&price=$price&text=$text'  data-id='$id' class='cotalog__product'>";
    $list .= "<img src='$path' alt='img' class='cotalog__img' width='100' height ='190'>";
    $list .= "<span class='cotalog__nameProduct'> $name </span>";
    $list .= "<span class='cotalog__priceProduct'>$price</span>";
    $list .= "<a>";
}
echo $list;
