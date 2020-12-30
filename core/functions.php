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

function renderPages(array $params)
{
    extract($params);
    if ($layout) {
        $fields = [
            'header' => renderTemplate('header', $params),
            'content' => renderTemplate($page, $params)
        ];
        echo renderTemplate($layout, $fields);
    } else {
        api($page);
    }
}

function api($page)
{
    $fileName = API . $page . ".php";
    include $fileName;
}

function getParams($page, $action)
{
    $layout = strpos($page, 'api-') === false ? 'layouts/main' : null;
    $params['menu'] = compilateMenu(menu());
    $params['user'] = getUser();
    switch ($page) {
        case 'index':
            $params['title'] = 'Главная';
            break;
        case 'reviews':
            $page = "reviews/reviews";
            $reviews =  get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            $params['reviews'] = $reviews;
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
            $params = array_merge($params, catalogActions($action));
            break;

        case 'work':
            $page = "catalog/work";
            $id = protect($_GET['id']);
            $params['work'] = get_assoc_result("SELECT * FROM " . WORKS . " WHERE id=$id")[0];
            $params['errors'] =  $_POST['errors'];
            break;
            
        case 'auth':
            $page = "auth/enter";
              switch ($action) {
                case 'enter':
                    $page = "auth/enter";
                    break;
                case 'logout':
                    $page = "auth/logout";
                    break;
                case 'edit':
                    $page = "admin/catalog/edit-work";
                    break;
                case 'delete':
                    $page = "admin/catalog/edit-work";
                    break;
            } 
            break;

        case 'api-reviews':
            $page = 'reviews';
            break;

        case 'api-auth':
            $page = 'auth';
            break;
    }
    return [
        'layout' => $layout,
        'page' => $page,
        'params' => $params
    ];
}
