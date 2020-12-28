<?php
error_reporting(0);
$action = protect($_POST['action']);
switch ($action) {
    case 'enter':
        $login = trim(protect($_POST['login']));
        $password = protect($_POST['password']);
        $save = isset($_POST['save']) ? true : null;
        $user = get_assoc_result("SELECT * FROM users WHERE login='{$login}'")[0];
        $user = $user ? $user : get_assoc_result("SELECT * FROM users WHERE email='{$login}'")[0];

        if ($user) {
            if (password_verify($password, $user['password'])) {
                echo json_encode(['result'=>'ok']);
            } else {
                echo json_encode(['error'=>'ok']);
            }
        } else {
            echo json_encode(['error'=>'ok']);
        }
        break;
}
