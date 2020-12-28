<?php
error_reporting(0);
$action = protect($_POST['action']);
switch ($action) {
    case 'enter':
        if (!isset($_SESSION['user'])) {
            $fp = protect($_POST['fp']);
            $save = protect($_POST['save']);
            $login = trim(protect($_POST['login']));
            $password = protect($_POST['password']);
            $save = isset($_POST['save']) ? true : null;
            $user = get_assoc_result("SELECT * FROM users WHERE login='{$login}'")[0];
            $user = $user ? $user : get_assoc_result("SELECT * FROM users WHERE email='{$login}'")[0];
            $id = $user['id'];
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    if (!$save) {
                        session_start();
                        $_SESSION['user'] = $login;
                        $_SESSION['user_id'] = $user['id'];
                        echo json_encode(['result' => 'ok']);
                    } else {     
                        $hash = uniqid(rand(), true);
                        $setHashAndFp = execute("INSERT INTO 'hash_and_fp' VALUES (null,$id, $hash, $fp)");
                        setcookie("hash", "$hash", time() + 900, "/");
                    }
                } else {
                    echo json_encode(['error' => 'ok']);
                }
            } else {
                echo json_encode(['error' => 'ok']);
            }
        }
        break;
}
