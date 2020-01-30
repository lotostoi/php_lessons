<form action="#" class="creatDB" method="POST">

<hr>
<h3 class="createT__h3">Создание таблици!</h3>

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
<hr>