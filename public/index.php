<?php
include_once "../config/config.php";




$url_array = explode('/', $_SERVER['REQUEST_URI']);


$page =  $url_array[1] !== '' ? str_replace('-', '/', $url_array[1]) : 'index';


if (strstr($page, '?')) {
    $page = explode('?', $page)[0];
}

$menu_params = [
    'menu' => compilateMenu(menu())
];

switch ($page) {
    case 'index':
        $content_params = ['title' => 'Главная'];
        break;
    case 'portfolio':
        $content_params = ['title' => 'Портфолио'];
        break;
    case 'gallery/main':
        $result_load = !empty($_FILES) || $_GET['messag'] === 'ok' || $_GET['dellAll'] === 'ok' ? load_content() : null;
        $content_params = [
            'title' => 'Домашняя работа',
            'form' => renderTemlate('gallery/loader', ['result_load' => $result_load]),
            'gallery' => renderTemlate('gallery/gallery', ['gallery' => getgallery()]),
        ];
        break;
    case 'gallery/picture':
        $id = (int) $_GET['id'];
        inc_namber_of_views_by_id($id);
        $content_params = [
            'image' => getImegeById($id)
        ];
        break;
    case 'calculator1':
        $page = "calculators/select";
        $operation = $_POST['operation'];
        $x = isset($_POST['firstNumber']) ? (int)$_POST['firstNumber'] : 0;
        $y = isset($_POST['secondNumber']) ? (int)$_POST['secondNumber'] : 0;
        $result = $operation ? mathOperation($x, $y, $operation) : null;
        $content_params = [
            'x' => $x,
            'y' => $y,
            'result' => $result,
        ];
        break;
    case 'calculator2':
        $page = "calculators/input";
        $content_params = [];
        break;
}

$fields = [
    'header' => renderTemlate('header', $menu_params),
    'content' => renderTemlate($page, $content_params)
];

echo renderTemlate('layouts/main', $fields);
