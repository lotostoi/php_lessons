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

function toLogout()
{
    if (getUser()) {
        header("Location: /authorization/logout");
        die();
    }
};

function toEnter()
{
    if (!getUser()) {
        header("Location: /authorization/enter");
        die();
    }
}

function blockedPage()
{
    if (!isAccessUser()) {
        if (getUser()) {
            header("Location: /authorization/logout");
            die();
        } else {
            header("Location: /authorization/enter");
            die();
        }
    }
}



// функция авторизации через сайт
function web_auth()
{
    if (!isset($_SESSION['user'])) {
        $redirect = $_POST['redirect'];
        $login = trim(protect($_POST['login']));
        $password = protect($_POST['password']);
        $save = $_POST['save'] ? true : "false";
        $user = get_assoc_result("SELECT * FROM users WHERE login='{$login}'")[0];
        $user = $user ? $user : get_assoc_result("SELECT * FROM users WHERE email='{$login}'")[0];
        if ($user) {
            if (password_verify($password, $user['password'])) {
                auth($user, $save);
                header("Location: /$redirect");
                die();
            } else {
                session_start();
                $_SESSION['auth_error'] = "Неверный логин или пароль";
                header("Location: /authorization/enter");
                die();
            }
        } else {
            session_start();
            $_SESSION['auth_error'] = "Неверный логин или пароль";
            header("Location: /authorization/enter");
            die();
        }
    }
}

// авторизация через vk

function sn_auth()
{
    $redirect = $_SESSION['redirect'];
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
    $admin = 0;
    $user = get_assoc_result("SELECT * FROM users WHERE `sosial_network`='{$sosial_network}' AND `id_in_sosial_network`={$id_in_sosial_network}")[0];
    if ($user) {
        auth($user, $save);
        $_SESSION['sn_user'] = null;
        $_SESSION['save_sn'] = null;
        header("Location: /$redirect");
        die();
    } else {
        $addUser = execute("INSERT INTO users VALUES('0','{$login}','{$first_name}','{$last_name}','{$img_small}','{$img_big}','{$sosial_network}',{$id_in_sosial_network},'{$link_to_sosial_network}','{$email}','{$password}',{$admin})")[0];
        if ($addUser) {
            $user = get_assoc_result("SELECT * FROM users WHERE `sosial_network`=`{$sosial_network}` AND `id_in_sosial_network`=$id_in_sosial_network")[0];
            if ($user) {
                auth($user, $save);
                $_SESSION['sn_user'] = null;
                $_SESSION['save_sn'] = null;
                header("Location: /$redirect");
                die();
            }
            header("Location: /$redirect");
            die();
        }
        header("Location: /$redirect");
        die();
    }
}

function auth($user, $save)
{
    $_SESSION['user'] = $user;
    $id = $user['id'];

    if ($save == 1) {
        $hash = uniqid(rand(), true);
        $setHashAndFp = execute("INSERT INTO hashes VALUES (null,'$id', '$hash')");
        setcookie("hash", "$hash", time() + 60 * 60 * 24 * 30, "/");
    }
}
