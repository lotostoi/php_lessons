<?php
session_start();

$_SESSION['save_sn'] = $_SESSION['save_sn'] ? $_SESSION['save_sn'] : $_POST['save_sn'];
$_SESSION['redirect'] = $_POST['redirect'] ? $_POST['redirect'] : ($_SESSION['redirect'] ? $_SESSION['redirect'] : 'reviews');
$link_for_redirect = VK_REDIRECT;
$link_for_code = "https://oauth.vk.com/authorize?client_id=" . VK_ID . "&display=page&redirect_uri=$link_for_redirect&scope=friends&response_type=code&v=5.126";
if ($_POST['start'] == 1) {
    header("Location: {$link_for_code}");
    die();
}
if ($_GET['code']) {
    $code = $_GET['code'];
    $link_for_token = "https://oauth.vk.com/access_token?client_id=" . VK_ID . "&client_secret=" . VK_SICRET_KEY . "&redirect_uri=$link_for_redirect&code=$code";
    $token = json_decode(file_get_contents($link_for_token), true);
    $user_id = $token['user_id'];
    $access_token = $token['access_token'];
    $user = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_id=$user_id&access_token=$access_token&fields=id,nickname,first_name,last_name,photo_100,photo_max_orig&v=5.52"), true);
    $_SESSION['sn_user'] = $user['response'][0];
    $_SESSION['sn_user']['sosial_network'] = 'vk';
    $_SESSION['sn_user']['link_to_sosial_network'] = 'https://vk.com/id' . $user['response'][0]['id'];
    $_SESSION['sn_user']['email'] = 'не указан';
    header("Location: /api-auth?action=enter");
    die();
} else {
    die("Error - VK");
}
