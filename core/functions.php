<?php

function renderTemplate($page, array $fields = [])
{
    extract($fields);
    ob_start();
    $fileName = TEMPLATES . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        echo "Error - template's file '{$fileName}' wasn't founded...";
    }
    return ob_get_clean();
}

function renderPages($page, $params)
{
    $fields = [
        'header' => renderTemplate('header', $params),
        'content' => renderTemplate($page, $params)
    ];
    echo renderTemplate('layouts/main', $fields);
}

function api($page)
{
    $fileName = API . $page . ".php";
    include $fileName;
}

function renderPage($page, $action)
{
    $menu = compilateMenu(menu());
    switch ($page) {
        case 'index':
            $params = [
                'menu' => $menu,
                'title' => 'Главная'
            ];
            renderPages($page, $params);
            break;

        case 'reviews':
            $page = "reviews/reviews";
            $reviews =  get_db_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            $params = [
                'menu' => $menu,
                'reviews' => $reviews
            ];
            renderPages($page, $params);
            break;
        case 'catalog':
            switch ($action) {
                case 'get':
                    $page = "catalog/catalog";
                    break;
                case 'add':
                    $page = "admin/catalog/add-work";
                    break;
                case 'edit':
                    $page = "admin/catalog/edit-work";
                    break;
                case 'delete':
                    $page = "admin/catalog/edit-work";
                    break;
            }
            $params = catalogActions($action);
            renderPages($page, $params);
            break;
        case 'work':
            $page = "catalog/work";
            $id = $_GET['id'];
            $params = [
                'menu' => $menu,
                'work' => get_db_result("SELECT * FROM " . WORKS . " WHERE id=$id")[0],
                'errors' => $_POST['errors']
            ];
            renderPages($page, $params);
    }
}

function server($page)
{
    switch ($page) {
        case 'api-calculator':
            $page = 'calculator';
            api($page);
            break;
        case 'api-reviews':
            $page = 'reviews';
            api($page);
            break;
    }
}
