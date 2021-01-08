<?php
session_start();
error_reporting(0);

$action = '';
if (!empty($_POST['action'])) {
    $action = $_POST['action'];
}
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'enter':
     
        if (isset($_POST['login']) || isset($_POST['password'])) {
            web_auth();        
        }
        if (!empty($_SESSION['sn_user'])) {
            sn_auth();
        }
        break;

    case 'logout':
        if (getUser()) {
            session_destroy();
            setcookie("hash", "", -1, "/");
            header("Location: /authorization/enter");
            die();
        }
        echo json_encode(['error' => 'ok']);
        break;
}

function getUserForAuth()
{
    if (!empty($_POST['login']) || !empty($_GET['password'])) {
        return  [
            'login' => $_POST['login'],
            'first_name' => null,
            'second_name' => null,
            'second_name' => null,
        ];
    }
}
