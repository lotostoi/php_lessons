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
        if (!isset($_SESSION['user'])) {
            $save = protect($_POST['save']);
            $login = trim(protect($_POST['login']));
            $password = protect($_POST['password']);
            $save = isset($_POST['save']) ? true : null;
            $user = get_assoc_result("SELECT * FROM users WHERE login='{$login}'")[0];
            $user = $user ? $user : get_assoc_result("SELECT * FROM users WHERE email='{$login}'")[0];
            $id = $user['id'];
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $login;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    if ($save) {
                        $hash = uniqid(rand(), true);
                        $setHashAndFp = execute("INSERT INTO hashes VALUES (null,'$id', '$hash')");
                        setcookie("hash", "$hash", time() + 60 * 60 * 24 * 30, "/");
                    }
                    echo json_encode(['result' => 'ok']);
                } else {
                    echo json_encode(['error' => 'ok']);
                }
            } else {
                echo json_encode(['error' => 'ok']);
            }
        }
        break;
    case 'check':
        if (getUser()) {
            echo json_encode([
                'user' => getUser(),
                'email' => getUserEmail()
            ]);
            die();
        }
        echo json_encode(['error' => 'ok']);
        break;
    case 'logout':
        if (getUser()) {
            session_destroy();
            echo json_encode(['result' => 'ok']);
            die();
        }
        echo json_encode(['error' => 'ok']);
        break;
}
