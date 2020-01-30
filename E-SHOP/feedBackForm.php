<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <title>Document</title>
    <link>
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
        <form action="#" method="POST" class="writeReview">
            <h1 class="writeReview__h1"> Пожалуйста оставте отзыв о нашем сайте! </h1>
            <label for="#" class="writeReview__user"> Ваше имя:
                <input type="text" name="nameUser" class="writeReview__nameUser">
            </label>
            <label for="#" class="writeReview__user"> Вашь e-mail:
                <input type="email" name="emailUser" class="writeReview__emailUser">
            </label>
            <label for="#" class="writeReview__user"> Вашь телефон:
                <input type="text" name="phoneUser" class="writeReview__phoneUser">
            </label>
            <label for="#" class="writeReview__user">
                <textarea name="textUser" class="writeReview__textUser" cols="30" rows="10"></textarea>
            </label>
            <input type="submit" name="sendReview" value="Отправить отзыв" class="writeReview__sendData">

        </form>

        <section class="reviews">
            <?php

            error_reporting(0);
            $sendReview = $_POST['sendReview'];
            include "dbinit.php";
            // данные для соеденения с базой данных.
            $nameServer = "localhost";
            $nameUserDB = "root";
            $nameDB = "shop_e";
            $nameTable = "reviews";

            // поля отзыва
            $nameUser = $_POST['nameUser'];
            $dateUser = date('Y-m-d h:i:s');
            $emailUser = $_POST['emailUser'];
            $phoneUser = $_POST['phoneUser'];
            $textUser = $_POST['textUser'];

            if ( $textUser != ""  &&  $nameUser != ""  &&  $nameDB != "") {

                $link = mysqli_connect($nameServer, $nameUserDB, "", $nameDB);
                if (!$link) die('Ошибка подключения к серверу баз данных.');

                $res = mysqli_query($link, $query->addOneRow($nameTable, null, $nameUser, $dateUser, $emailUser, $phoneUser, $textUser));

                if (!$res) die('Ошибка: ' . mysqli_error($link));
                mysqli_close($link);
            }

            $link = mysqli_connect($nameServer, $nameUserDB, "", $nameDB);
            if (!$link) die('Ошибка подключения к серверу баз данных.');

            $result = mysqli_query($link, $query->sort_max_min($nameTable, "data"));
            while ($val = mysqli_fetch_assoc($result)) {
                $name = $val['name'];
                $data =  $val['data'];
                $text = $val['text'];
                echo "
                    <div class='reviews__review'>
                    <span class='reviews__nameUser'> $name </span>
                    <p class='reviews__text'>$text.</p>
                    <span class='reviews__data'> $data </span>
                    </div>";
            }
            $nameUser ="";
            $dateUser = "";
            $emailUser = "";
            $phoneUser = "";
            $textUser = "";


            mysqli_close($link);

            ?>

        </section>

    </div>

</body>

</html>