<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <?php
        error_reporting(0);
        include "dbinit.php";
        $nameDB = $_POST['nameDB'];
        $nameServer = $_POST['serverName'];
        $nameUser = $_POST['userName'];
        $password = $_POST['password'];
        ?>

        <h3 class="createT__h3">Редактирование таблици</h3>
        <hr>

        <label for="#" class="creatDB__pole">Имя сервера:
            <input type="text" name="serverName" class="creatDB__serverName" value="<?= $nameServer ?>">
        </label>
        <label for="#" class="creatDB__pole">Имя пользователя:
            <input type="text" name="userName" class="creatDB__userName" value="<?= $nameUser ?>">
        </label>
        <label for="#" class="creatDB__pole">Пароль:
            <input type="text" name="password" class="creatDB__dbName" value="<?= $password ?>">
        </label>
        <label for="#" class="creatDB__pole">Название базы данных:
            <input type="text" name="nameDB" class="creatDB__pasName" value="<?= $nameDB ?>">
        </label>

        <hr>
        <label for="#" class="createT__pole">Название таблици:
            <?php
            $nameT = $_POST['nameT'];
            ?>
            <input type="text" name="nameT" class="createT__NameT" value="<?= $nameT ?>">
        </label>
        <label for="#" class="createT__numberRows">Число строк в таблице:
            <?php
            $quantRows = $_POST['numberRows'];
            ?>
            <input type="text" name="numberRows" class="createT__numberRows" value="<?= $quantRows  ?>">
        </label>


        <p> Показать таблицу: <input type="radio" name="show" value="show" class="radio"></p>
        <p> Запонить пустую таблицу: <input type="radio" name="show" value="build" class="radio"></p>
        <p> Редактировать таблицу: <input type="radio" name="show" value="chenges" class="radio"></p>

        <button name="showTabels" class="showTabels"> Выполнить </button>



        <?php


        if (isset($_POST['showTabels']) && $_POST['show'] == "show") {

            $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
            if (!$link) die('Ошибка подключения к серверу баз данных.');

            $form = "";

            $content = mysqli_query($link, $query->selectAll($nameT));
            $i = 0;
            while ($string = mysqli_fetch_assoc($content)) {

                $form .=  "<p> строка $i </p>  <div class='wrapper'>";

                foreach ($string as $key => $val) {
                    $form .=  " <label for='#' class='creatDB__pole'> $key:
            <input type='text' name='row$i-$key' class='creatDB__pasName' value='$val'>
        </label>";
                }
                $form .= "</div>";
                $i++;
            }
            // $form .= " <input type='submit' name='сhengeTabel' value='Перезаписать таблицу'>";
            $form .= "";
            echo $form;

            mysqli_close($link);
        } else {
            echo "<p> Место для вывода таблици </p>";
        }


        if (isset($_POST['showTabels']) && $_POST['show'] == "build") {

            $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
            if (!$link) die('Ошибка подключения к серверу баз данных.');

            $form = "";

            $resp = "SHOW COLUMNS FROM $nameT";

            $form .=  "<p> строка $j </p>  <div class='wrapper' >";

            for ($j = 1; $j <= $quantRows; $j++) {

                $form .=  "<p> строка $j </p>  <div class='wrapper'>";

                $content = mysqli_query($link, $resp);
                $i = 0;
                while ($string = mysqli_fetch_assoc($content)) {
                    $arrFields[$i++] = $string['Field'];
                    $namefield = $string['Field'];
                    $typefield = $string['Type'];
                    $vall = $_POST["$namefield-$j"];
                    $form .=  " <label for='#' class='creatDB__pole'>  поле  $namefield, тип поля $typefield:
                 <p> <input type='text' name='$namefield-$j' value='$vall'  class='creatDB__pasName' style='width:300px;'> </p>
                 </label>";
                    $form .= "</div> ";
                }
                $form .= "<hr> ";
            }
            $form .= "<button name='сhengeTabel' class='сhengeTabel'>Перезаписать таблицу'</button>";
            $form .= "";
            echo $form;
            mysqli_close($link);
            $_POST['arr'] = $arrFields;
            
            print_r($_POST['arr']);
        }

       

        if (isset($_POST['сhengeTabel'])) {
            for ($k = 1; $k <= $quantRows; $k++) {

                $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
                if (!$link) die('Ошибка подключения к серверу баз данных.');

                $resp = "SHOW COLUMNS FROM $nameT";
                $content = mysqli_query($link, $resp);
                $i = 0;
                while ($string = mysqli_fetch_assoc($content)) {
                    $arrFields[$i++] = $string['Field'];
                }

                for ($i=0; $i<count($arrFields); $i++) {        
                    $str = $arrFields[$i] . "-" .$k; 
                    $resalt[$i] =  $_POST["$str"];
                } 
           
                
                echo $newSrt;
                $resp = "INSERT INTO $nameT VALUES ( '$resalt[0]','$resalt[1]','$resalt[2]','$resalt[3]','$resalt[4]' )";
                echo $resp ."<hr>";
                $ress = mysqli_query($link,$resp) or die (mysqli_error($link));
                mysqli_close($link);
            }
        }
        ?>

    </form>
    <script>

    </script>

</body>

</html>