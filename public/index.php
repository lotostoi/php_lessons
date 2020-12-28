<?php
include_once "../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$page =  $url_array[1] !== '' ? $url_array[1] : 'index';
$action = $url_array[2];


if (strstr($action, '?')) {
    $action =  explode('?', $action)[0];
}
if (strstr($page, '?')) {
    $page =  explode('?', $page)[0];
}

$params = getParams($page, $action);

renderPages($params);
