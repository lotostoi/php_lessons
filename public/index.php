<?php
include_once "../config/config.php";




$urel_array = explode('/', $_SERVER['REQUEST_URI']);

//if ($urel_array[1] !== 'src') {
    $page =  $urel_array[1] !== '' ? str_replace('-', '/', $urel_array[1]) : 'index';


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
            $result_load = !empty($_FILES) || $_GET['messag'] === 'ok' || $_GET['dellAll'] === 'ok' ? load_content() : null;
            $menu_params = ['menu' => compilateMenu(menu())];
            $content_params = [
                'title' => 'Домашняя работа',
                'form' => renderTemlate('gallery/loader', ['result_load' => $result_load]),
                'gallery' => renderTemlate('gallery/gallery', ['gallery' => getgallery()]),
            ];
            break;
        case 'gallery/picture':
            $id = (int) $_GET['id'];
            inc_namber_of_views_by_id($id);
            $menu_params = ['menu' => compilateMenu(menu())];
            $content_params = [
                'image' => getImegeById($id)
            ];
            break;
    }

    $fields = [
        'header' => renderTemlate('header', $menu_params),
        'content' => renderTemlate($page, $content_params)
    ];

    echo renderTemlate('layouts/main', $fields);
//}
