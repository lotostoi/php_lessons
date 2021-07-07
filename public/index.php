<?php
session_start();
include_once "../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$page =  $url_array[1] !== '' ? $url_array[1] : 'index';
$action = $url_array[2];

if (strstr($page, '-')) {
    $page = str_replace('-', '_', $page);
}
if (strstr($action, '?')) {
    $action =  explode('?', $action)[0];
}
if (strstr($page, '?')) {
    $page =  explode('?', $page)[0];
}

$nameControllers = $page;

if (function_exists($nameControllers)) {
    $params = !empty($action) ? $nameControllers($action) : $nameControllers();
} else {
    exit(" Controller $nameControllers isn't");
}

renderPages($params);
