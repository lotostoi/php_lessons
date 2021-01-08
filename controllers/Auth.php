<?php
function authorization($action) {
    $params['layout'] = 'layouts/main';
    $params['user'] = getUser()['login'];

    switch ($action) {
        case 'enter':
            toLogout();
            $params['page'] = "auth/enter";
            $params['error'] = $_SESSION['auth_error'];
            $_SESSION['auth_error'] = null;
            $_SESSION['redirect'] = null;
            break;
        case 'logout':
            toEnter();
            auth_control();
            $params['full_user'] = getUser();
            $params['page'] = "auth/logout";
            break;
    }
   

    return $params;
}