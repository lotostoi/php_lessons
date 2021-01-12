<?php
session_start();
$_SESSION['save_sn'] = $_SESSION['save_sn'] ? $_SESSION['save_sn'] : $_POST['save_sn'];
$_SESSION['redirect'] = $_POST['redirect'] ? $_POST['redirect'] : $_SESSION['redirect'];
$link_for_redirect = VK_REDIRECT;
$link_for_code = "https://www.facebook.com/v9.0/dialog/oauth?client_id=" . FB_ID . "&redirect_uri=" . FB_REDIRECT . "&response_type=code&scope=email&state=tdtdtsdasydgjdbasdbasyub";
if ($_POST['start'] == 1) {

    header("Location: {$link_for_code}");
    die();
}
if ($_GET['code']) {
    $code = $_GET['code'];
    $link_for_token = "https://graph.facebook.com/v9.0/oauth/access_token?client_id=" . FB_ID . "&redirect_uri=" . FB_REDIRECT . "&client_secret=" . FB_SICRET_KEY . "&code={$code}";
    $token = json_decode(file_get_contents($link_for_token), true);
    $access_token = $token['access_token'];
    $id_user = json_decode(file_get_contents("https://graph.facebook.com/me?fields=id,name,email&access_token=$access_token"), true);
    $id = $id_user['id'];
    $user['login'] = explode(" ", $id_user['name'])[0];
    $user['first_name'] = explode(" ", $id_user['name'])[0];
    $user['last_name'] = explode(" ", $id_user['name'])[1];
    $user['photo_100'] = "https://graph.facebook.com/" . $id . "/picture?width=100";
    $user['photo_max_orig'] = "https://graph.facebook.com/" . $id . "/picture?width=300";
    $user['sosial_network'] = "fb";
    $user['id'] = $id;
    $user['link_to_sosial_network'] = "https://facebook.com/" . $id;
    $user['email'] = $id_user['email'];
    $_SESSION['sn_user'] = $user;
    header("Location: /api-auth?action=enter&redirect=");
    die();
} else {
    die("Error - FB");
}
