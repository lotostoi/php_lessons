<?php
include_once "../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$page =  $url_array[1] !== '' ? $url_array[1] : 'index';

if (strstr($page, '?')) {
    $page =  explode('?', $page)[0];
}
strpos($page, 'api-') !== false ? server($page) : renderPage($page);
