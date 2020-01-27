<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <title>Document</title>
</head>

<body>
    <div class="contener">
        <header class="header">
            <h1 class="header__h1"><a href="E-Shop.php?page=main" class="header__a">E-SHOP </a></h1>
            <ul class="header__ul">
                <li class="header__li"><a href="E-Shop.php?page=main" class="header__a">Main</a></li>
                <li class="header__li"><a href="#" class="header__a">Home</a></li>
                <li class="header__li"><a href="#" class="header__a">About Us</a></li>
                <li class="header__li"><a href="#" class="header__a">Products</a></li>
                <li class="header__li"><a href="feedBackForm.php" class="header__a">Reviews</a></li>
            </ul>
        </header>
        <section class="cotalog">

            <?php
            include "dbinit.php";
            error_reporting(0);
            $nameDB = "shop_e";
            $nameServer = "localHost";
            $nameUser = "root";
            $password = "";
            $nametabel = "cotalog";

            $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
            if (!$link) die('Ошибка подключения к серверу баз данных.');
            $list = "";
            $products = mysqli_query($link, $query->selectAll($nametabel));
            while ($product = mysqli_fetch_assoc($products)) {
                $id = $product['id'];
                $name = $product['name'];
                $path = $product['linkImg'];
                $price = $product['price'];
                $text= $product['description'];       
           
                $list .=  "<a href='E-Shop.php?page=$id&name=$name&link=$path&price=$price&text=$text' class='cotalog__product'>";
                $list .= "<img src='$path' alt='img' class='cotalog__img' width='100' height ='190'>";
                $list .= "<span class='cotalog__nameProduct'> $name </span>";
                $list .= "<span class='cotalog__priceProduct'>$price</span>";
                $list .= "<a>";
            }     
            if ($_GET['page'] == "main" || !$_GET['page']) {
                echo $list;
            }
            else {
                require ('pageProduct.php');
            }
            ?>

        </section>
    </div>

</body>

</html>