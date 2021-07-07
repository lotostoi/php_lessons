<?php
error_reporting(0);
include "dbinit.php";
$logon_reg = $_POST['login'];
$pas_reg = $_POST['password'];
$email_reg = $_POST['email'];

if (isset($_POST['reg']) && isset($_POST['login_reg']) && isset($_POST['password_reg'])) {

    $arr = getArrPole($link,USERS,'login');
    foreach ($arr as $key => $val) {
        if ($val == $_POST['login_reg']) {
            $flag = true;
        }
    };

    if (!$flag) {
        mysqli_query($link, $query->addOneRow_5(USERS, null, $logon_reg, $pas_reg, '0',$email_reg));
        $text = "<p>Вы успешно зарегестрированны!</p>";
    }else {
        $text = "<p>Логин занят!</p>";
    }
   
   

}
?>
<form class="entrance" method="POST">
    <label class="entrance__login">Логин <input type="text" name="login_reg" value="<?=$logon_reg?>"></label>
    <label class="entrance__login">Пароль <input type="password" name="password_reg" value="<?=$pas_reg?>"></label>
    <label class="entrance__login">E-mail <input type="email" name="email" value="<?=$email_reg?>"></label>
    <input type="submit" name="reg" value="Регистрация" class="entrance__btn">
    <?= $text?>
</form>
