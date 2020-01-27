<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="admindDb">
        <form action="#" class="creatDB" method="POST">
            <hr>
            <h3 class="creatDB__h3">Создание базы данных</h3>
            <hr>

            <?php
            include "dbinit.php";
            error_reporting(0);
            $nameDB = $_POST['nameDB'];
            $nameServer = $_POST['serverName'];
            $nameUser = $_POST['userName'];
            $password = $_POST['password'];

            ?>

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
            <button type="submit" name="creatDB" value="createDB"> Создать базу данных </button>
            <button type="submit" name="deleteDB" value="deleteDB">Удалить базу данных</button>
            <hr>

            <?php
            include "createBD.php"
            ?>

            <hr>

            <h3 class="createT__h3">Создание таблици!</h3>
            <hr>
            <label for="#" class="createT__pole">Название таблици:
                <?php
                $nameT = $_POST['nameT'];
                ?>
                <input type="text" name="nameT" class="createT__NameT" value="<?= $nameT ?>">
            </label>
            <label for="#" class="createT__numberFields">Число полей:
                <?php
                $quant = $_POST['numberFields'];
                ?>
                <input type="text" name="numberFields" class="createT__numberFields" value="<?= $quant ?>">
            </label>
            <input type="submit" name="createRows" value="Задать поля">
            <hr>
            <?php
            $rows = $_POST['creareRows'];

            if (isset($rows) != 0)
                $str_pole = "";
            $namePole = $_POST["namePole$i"];

            for ($i = 1; $i <= $_POST['numberFields']; $i++) {
                $namePole = $_POST["namePole$i"];
                $typePole = $_POST["typePole$i"];
                $lengthPole = $_POST["lengthPole$i"];
                $str_pole .= "<label class='createT__pole'>Название поля:
                    <input type='text' name='namePole$i' class='createT__NameT' value='$namePole'>
                </label>";
                $str_pole .= "<label class='createT__pole'>Тип поля:
                    <input type='text' name='typePole$i' class='createT__NameT' value='$typePole'>
                </label>";
                $str_pole .= "<label class='createT__pole'>Длина/значение :
                    <input type='text' name='lengthPole$i' class='createT__NameT' value='$lengthPole'>
                </label>";
                $str_pole .= "<label class='createT__pole'>PRIMARY:
                    <input type='checkbox' name='PRIMARYPole$i' class='createT__NameT'>
                </label>";
                $str_pole .= "<label class='createT__pole'>A_I:
                    <input type='checkbox' name='A_IPole$i' class='createT__NameT'>
                </label> <br>";
            }
            echo $str_pole;
            ?>
            <hr>
            <input type="submit" name="createT" value="Создать таблицу">
            <input type="submit" name="deleteT" value="Удалить таблицу">

            <?php

            if (isset($_POST['createT']) != null) {
                $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
                if (!$link) die('Ошибка подключения к серверу баз данных.');

                $response = "CREATE Table $nameT (";

                for ($i = 1; $i <= $_POST['numberFields']; $i++) {

                    $namePole = $_POST["namePole$i"];
                    if ($namePole != "") {
                        $response .= $namePole;
                    }

                    $response .= " ";

                    $typePole = $_POST["typePole$i"];
                    if ($typePole != "") {
                        $response .= $typePole;
                    }

                    $lengthPole = $_POST["lengthPole$i"];
                    if ($lengthPole != "") {
                        $response .= "($lengthPole)";
                    }

                    $response .= " NOT NULL ";

                    $primaryPole = $_POST["PRIMARYPole$i"];
                    if ($primaryPole != "") {
                        $response .= "PRIMARY KEY";
                    }

                    $response .= " ";

                    $A_I_Pole = $_POST["A_IPole$i"];
                    if ($A_I_Pole != "") {
                        $response .= "AUTO_INCREMENT";
                    }

                    if ($i != $_POST['numberFields']) {
                        $response .= ", ";
                    }
                }
                $response .= ")";
                mysqli_query($link, $response) or die(mysqli_error($link));
                echo "<p class='creatDB__resalt'> Таблица $nameT успешно создана </p>";;
                mysqli_close($link);
            }

            if (isset($_POST['deleteT']) != null) {
                $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
                if (!$link) die('Ошибка подключения к серверу баз данных.');

                mysqli_query($link, $query->deleteTable($nameT));

                echo "<p class='creatDB__resalt'> Таблица $nameT успешно удалена </p>";
                mysqli_query($link, $response) or die(mysqli_error($link));
                mysqli_close($link);
            }

            ?>

        </form>

        <form action="" method="POST">


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
            <input type="submit" name="showRows" value="Заполнить/редактировать/показать таблицу">

        </form>

        <?php

        $chengeTable = $_POST['showRows'];

        if ($chengeTable) {
            $link = mysqli_connect($nameServer, $nameUser, $password, $nameDB);
            if (!$link) die('Ошибка подключения к серверу баз данных.');

            $form = "<form action='' method='POST'>";

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

                if ((int) $quantRows != 0) {
                    if ($quantRows == $i) {
                        break;
                    }
                }
            }
            $form .= " <input type='submit' name='сhengeTabel' value='Перезаписать таблицу'>";
            $form .= "</form>";
            echo $form;


            mysqli_close($link);
        }








        ?>


        <hr>





    </div>

</body>

</html>