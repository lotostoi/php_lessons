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
            $user = $user_id = get_assoc_result("SELECT * FROM hashes WHERE  id = {$user_id}")[0];
            $_SESSION['user'] = $user['login'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            return $user['login'];
        }
    }
    return false;
}

function getUserEmail()
{
    if ($_SESSION['user_email']) {
        return $_SESSION['user_email'];
    }
    return false;
}

function isAccessUser()
{
    if (isset($_SESSION['user'])) {
        $id = (int) $_SESSION['user_id'];
        return get_assoc_result("SELECT admin FROM users WHERE id={$id}")[0];
    }
    return false;
}
