<?php
include_once "../config/config.php";

$page =  isset($_GET['page']) ? $_GET['page'] : 'index';
if (strstr($page, '?')) {
    $page = explode('?', $page)[0];
}

switch ($page) {
    case 'index':
        $menu_params = ['menu' => compilateMenu(menu())];
        $content_params = ['title' => 'Главная'];
        break;
    case 'portfolio':
        $menu_params = ['menu' => compilateMenu(menu())];
        $content_params = ['title' => 'Портфолио'];
        break;
    case 'gallery/main':
        $result_load = !empty($_FILES) || $_GET['messag'] === 'ok' ? load_content() : null;
        $menu_params = ['menu' => compilateMenu(menu())];
        $content_params = [
            'title' => 'Домашняя работа',
            'form' => renderTemlate('gallery/loader', ['result_load' => $result_load]),
            'gallery' => renderTemlate('gallery/gallery', ['gallery' => getgallery()]),
        ];
        break;
}

$fields = [
    'header' => renderTemlate('header',  $menu_params),
    'content' => renderTemlate($page, $content_params)
];

echo renderTemlate('layouts/main', $fields);
