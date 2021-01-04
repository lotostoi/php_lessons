<?php
function getUser()
{
    if ($_SESSION['user']) {
        return $_SESSION['user'];
    } elseif ($_COOKIE['hash']) {
        $hash = $_COOKIE['hash'];
        $user_id = get_assoc_result("SELECT * FROM hashes WHERE  hash = '{$hash}'")[0];
        $user_id  = $user_id['id_user'];
        if ($user_id) {
            $user = $user_id = get_assoc_result("SELECT * FROM users WHERE  id = {$user_id}")[0];
            $_SESSION['user'] = $user;
            return $user;
        }
    }
    return false;
}
function enter_control()
{

    if ($_POST['sn'] === "vk") {
        $link =  $_POST['save_sn'] ? "/api-auth-vk?start=1&save_sn=1" : "/api-auth-vk?start=1";
        header("Location:  $link");
    }
    if ($_POST['sn'] === "fb") {
        $link =  $_POST['save_sn'] ? "/api-auth-fb?start=1&save_sn=1" : "/api-auth-fb?start=1";
        header("Location:  $link");
    }
    if ($_POST['sn'] === "site") {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $link =  $_POST['save'] ? "/api-auth?action=enter&login=$login&password=$password&start=1&save=1" : "/auth/enter?login=$login&password=$password&start=1";
        header("Location:  $link");
    }
}

function auth_control()
{
    if (!empty($_POST['action'])) {
        header("Location: /api-auth?action=" . $_POST['action']);
    }
}


function isAccessUser()
{
    return getUser()['admin'];
}

function redirect()
{
    /*  if (!getUser()['admin']) {
        if (!empty(getUser()['login'])) {
            header("Location: /auth/logout");
        } else {
            header("Location: /auth/enter");
        }
    } */
}

// функция авторизации через сайт
function web_auth()
{
    if (!isset($_SESSION['user'])) {
        $login = trim(protect($_GET['login']));
        $password = protect($_GET['password']);
        $save = isset($_GET['save']) ? true : null;
        $user = get_assoc_result("SELECT * FROM users WHERE login='{$login}'")[0];
        $user = $user ? $user : get_assoc_result("SELECT * FROM users WHERE email='{$login}'")[0];
        if ($user) {
            if (password_verify($password, $user['password'])) {
                auth($user, $save);
                header("Location: /reviews");
                die();
            } else {
                session_start();
                $_SESSION['auth_error'] = "Неверный логин или пароль";
                header("Location: /auth/enter");
                die();
            }
        } else {
            session_start();
            $_SESSION['auth_error'] = "Неверный логин или пароль";
            header("Location: /auth/enter");
            die();
        }
    }
}

// авторизация через vk

function vk_auth()
{
    $save = $_SESSION['save_sn'];
    $sn_user = $_SESSION['sn_user'];
    $login = $sn_user['nickname'] != '' ? $sn_user['nickname'] : $sn_user['first_name'];
    $first_name = $sn_user['first_name'];
    $last_name = $sn_user['last_name'];
    $img_small = $sn_user['photo_100'];
    $img_big = $sn_user['photo_max_orig'];
    $sosial_network = $sn_user['sosial_network'];
    $id_in_sosial_network = $sn_user['id'];
    $link_to_sosial_network = $sn_user['link_to_sosial_network'];
    $email =  $sn_user['email'];
    $password = null;
    $admin = 0; //(bool) $sn_user['id'] == 631958029;
    $user = get_assoc_result("SELECT * FROM users WHERE `sosial_network`='{$sosial_network}' AND `id_in_sosial_network`={$id_in_sosial_network}")[0];
    if ($user) {
        auth($user, $save);
        $_SESSION['sn_user'] = null;
        $_SESSION['save_sn'] = null;
        header("Location: /reviews");
    } else {
        $addUser = execute("INSERT INTO users VALUES('0','{$login}','{$first_name}','{$last_name}','{$img_small}','{$img_big}','{$sosial_network}',{$id_in_sosial_network},'{$link_to_sosial_network}','{$email}','{$password}',{$admin})")[0];
        if ($addUser) {
            $user = get_assoc_result("SELECT * FROM users WHERE `sosial_network`=`{$sosial_network}` AND `id_in_sosial_network`=$id_in_sosial_network")[0];
            if ($user) {
                auth($user, $save);
                $_SESSION['sn_user'] = null;
                $_SESSION['save_sn'] = null;
                header("Location: /reviews");
            }
        }
    }
}

function auth($user, $save)
{
    $_SESSION['user'] = $user;
    $id = $user['id'];
    if ($save != "false") {
        $hash = uniqid(rand(), true);
        $setHashAndFp = execute("INSERT INTO hashes VALUES (null,'$id', '$hash')");
        setcookie("hash", "$hash", time() + 60 * 60 * 24 * 30, "/");
    }
}
