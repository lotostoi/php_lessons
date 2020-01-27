<?php  
    if (isset($_POST['creatDB'])) {
     
        $link = mysqli_connect($nameServer, $nameUser, $password);
        if (!$link) die('Ошибка подключения к серверу баз данных.');

        if (($nameDB == "") || ($_POST['serverName'] == '')  || ($nameUser ==  ''))
            die("<p class='creatDB__resalt'> Одно или несколько полей ввода заполнены некорректно");
        if (mysqli_query($link, $query->createDB($nameDB))) {

            echo "<p class='creatDB__resalt'> База данных $nameDB успешно создана";
        } else {
            echo "<p class='creatDB__resalt'> Ошибка при создании базы данных:" . mysqli_error($link) . "</p>";
        }
        mysqli_close($link);
    } else if (isset($_POST['deleteDB']) ) {

        $link = mysqli_connect($_POST['serverName'], $nameUser, $password);
        if (!$link) die('Ошибка подключения к серверу баз данных.');

        if ((isset($nameDB) ==  null) || (isset($nameServer) ==  null)  || (isset($nameUser) ==  null))
            die("<p class='creatDB__resalt'> Одно или несколько полей ввода заполнены некорректно");
        if (mysqli_query($link, $query->deleteDB($nameDB))) {
       
            echo "<p class='creatDB__resalt'> База данных $nameDB успешно удалена";
        } else {
            echo "<p class='creatDB__resalt'> Ошибка при удалении базы данных:" . mysqli_error($link) . "</p>";
        }
        mysqli_close($link);
    } else {
        echo "<p class='creatDB__resalt'> Информационное окно.</p>";
    }
  

?>
