<?php

include_once "../config/config.php";

$page =  isset($_GET['page']) ? $_GET['page'] : 'index';

switch ($page) {
    case 'index':
        $menu_params = ['menu' => $menu];
        $content_params = ['title' => 'Главная'];
        break;
    case 'portfolio':
        $menu_params = ['menu' => $menu];
        $content_params = ['title' => 'Портфолио'];
        break;
    case 'Gallery/gallery':
        $menu_params = ['menu' => $menu];
        $content_params = ['title' => 'Домашняя работа'];
        break;
}

$fields = [
    'header' => renderTemlate('header',  $menu_params),
    'content' => renderTemlate($page, $content_params)
];

echo renderTemlate('layouts/main', $fields);
