<?php

$page =  isset($_GET['page']) ? $_GET['page'] : 'index';
// что бы проверить реккурсивную отрисовку меню, можно раскоментирвать часть массива.
$menu = [
    ['name' => 'Главная', 'href' => './', 'value' => 'Главная'],
    ['name' => 'Портфолио', 'href' => './?page=portfolio', 'value' => 'Портфолио'],
    ['name' => 'Упражнения', 'href' => './?page=mainTasks', 'value' => ''/*  [
        ['name' => 'Главная', 'href' => './', 'value' => 'Главная'],
        ['name' => 'Портфолио', 'href' => './?page=portfolio', 'value' => 'Портфолио'],
        ['name' => 'Упражнения', 'href' => './?page=mainTasks', 'value' => [
            ['name' => 'Главная', 'href' => './', 'value' => 'Главная'],
            ['name' => 'Портфолио', 'href' => './?page=portfolio', 'value' => 'Портфолио'],
            ['name' => 'Упражнения', 'href' => './?page=mainTasks', 'value' => 'Упражнения'],
        ]],
    ] */],
];
// Олег рассказжи или хотябы намекни(что погуглить) как тут без switch  сделать?
switch ($page) {
    case 'index':
        $menu_params = ['menu' => $menu];
        $content_params = ['title' => 'Главная'];
        break;
    case 'portfolio':
        $menu_params = ['menu' => $menu];
        $content_params = ['title' => 'Портфолио'];
        break;
    case 'mainTasks':
        $menu_params = ['menu' => $menu];
        $content_params = ['title' => 'Домашняя работа'];
        break;
}

function renderTemlate($page, array $fields = [])
{
    extract($fields);
    ob_start();
    $fileName = "templates/" . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        echo "Error- template's file '{$fileName}' wasn't founded...";
    }
    return ob_get_clean();
}

$fields = [
    'header' => renderTemlate('header',  $menu_params),
    'content' => renderTemlate($page, $content_params)
];

echo renderTemlate('layouts/main', $fields);
