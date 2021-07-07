<?php
session_start();

error_reporting(0);
echo $_SESSION['id_user'];


if (isset($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
} else {
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
}

if ($_GET['entraceStatus'] != 1) {

    if (isset($_POST['exit'])) { 
        session_destroy();
       // echo "<script> window.location.reload() </script>";
    }


    if (isset($_POST['entrance']) && isset($_POST['login']) && isset($_POST['password'])) {

        $arr = getArrPole($link, USERS, 'login');
        foreach ($arr as $key => $val) {
            if ($val == $_POST['login']) {
                $flag = true;
                $index = $key;
            }
        };

        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($flag) {

            $pas = getArr($link, USERS)[$index]['password'];

            if ($pas == $_POST['password']) {

                setcookie("login", $_POST['login'], time() + 3600 * 24 * 365);
                setcookie("password", $_POST['password'], time() + 3600 * 24 * 365);
                $_SESSION['user'] = $_POST['login'];
                $_SESSION['id_user'] = getArr($link, USERS)[$index]['id'];

                $_GET['entraceStatus'] = 1;
            } else {

                $_GET['entraceStatus'] = 2;
            }
        } else {

            $_GET['entraceStatus'] = 2;
        }
    }

?>
<form class="entrance" method="POST">
    <label class="entrance__login">Логин <input type="text" name="login" value="<?= $login ?>"></label>
    <label class="entrance__login">Пароль <input type="password" name="password" value="<?= $password ?>"></label>
    <div class="wrapperButtons">
    <input type="submit" name="entrance" value="Войти" class="entrance__btn">
    <input type="submit" name="exit" value="Выйти" class="entrance__btn">
    </div>
   
    <?php
    if ($_GET['entraceStatus'] == 2) {
    ?>
        <p>Неверный логин или пароль.</p>
        <p>Или вы не зарегистрированны:<a href="E-Shop.php?page=reg"> Регистрация </a></p>
    <?php
    } ?>
    <?php

    if ($_GET['entraceStatus'] == 1) {
    ?>

        <p>Вы вошли!</p>

    <?php
    }
    ?>
</form>
<?php
}
?>