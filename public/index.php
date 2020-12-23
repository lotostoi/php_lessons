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
        renderPages($page, $menu_params, $content_params);
        break;
    case 'portfolio':
        $content_params = ['title' => 'Портфолио'];
        renderPages($page, $menu_params, $content_params);
        break;
    case 'gallery/main':
        $result_load = !empty($_FILES) || $_GET['messag'] === 'ok' || $_GET['dellAll'] === 'ok' ? load_content() : null;
        $content_params = [
            'title' => 'Домашняя работа',
            'form' => renderTemplate('gallery/loader', ['result_load' => $result_load]),
            'gallery' => renderTemplate('gallery/gallery', ['gallery' => getgallery()]),
        ];
        renderPages($page, $menu_params, $content_params);
        break;
    case 'gallery/picture':
        $id = (int) $_GET['id'];
        inc_number_of_views_by_id($id);
        $content_params = [
            'image' => getImegeById($id)
        ];
        renderPages($page, $menu_params, $content_params);
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
        renderPages($page, $menu_params, $content_params);
        break;
    case 'calculator2':
        $page = "calculators/input";
        $content_params = [];
        renderPages($page, $menu_params, $content_params);
        break;
    case 'reviews':
        $page = "reviews/reviews";
        $reviews = $images = get_db_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
        $content_params = ['reviews' => $reviews];
        renderPages($page, $menu_params, $content_params);
        break;
    case 'calculator':
        api($page);
        break;
    case 'calculator' || 'apireviews':
        api($page);
        break;
}

function renderPages($page, $menu_params, $content_params)
{
    $fields = [
        'header' => renderTemplate('header', $menu_params),
        'content' => renderTemplate($page, $content_params)
    ];
    echo renderTemplate('layouts/main', $fields);
}
