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

function renderPage($page)
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
            /*       case 'gallery':
            $page = 'gallery/main';
            $flag =  !empty($_FILES) || $_GET['message'] === 'ok' || $_GET['dellAll'] === 'ok';
            $result_load = $flag ? load_content() : null;
            $params = [
                'menu' => $menu,
                'form' => renderTemplate('gallery/loader', ['result_load' => $result_load]),
                'gallery' => renderTemplate('gallery/gallery', ['gallery' => getgallery()]),
            ];
            renderPages($page, $params);
            break;
        case 'picture':
            $page = 'gallery/picture';
            $id = (int) $_GET['id'];
            inc_number_of_views_by_id($id);
            $params = [
                'menu' => $menu,
                'image' => getImageById($id)
            ];
            renderPages($page, $params);
            break; */
        case 'calculator1':
            $page = "calculators/select";
            $operation = $_POST['operation'];
            $x = isset($_POST['firstNumber']) ? (int)$_POST['firstNumber'] : 0;
            $y = isset($_POST['secondNumber']) ? (int)$_POST['secondNumber'] : 0;
            $result = $operation ? mathOperation($x, $y, $operation) : null;
            $params = [
                'menu' => $menu,
                'x' => $x,
                'y' => $y,
                'result' => $result,
            ];
            renderPages($page, $params);
            break;
        case 'calculator2':
            $page = "calculators/input";
            renderPages($page, [
                'menu' => $menu,
            ]);
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
            $page = "catalog/catalog";
            getCatalog();
            $params = [
                'menu' => $menu,
                'catalog' => getCatalog()
            ];
            renderPages($page, $params);
            break;
        case 'addwork':
            $page = "admin/catalog/add-work";
            errors();
            if (count($_SESSION['errors']) === 0 && $_POST['title']) {
                addWork();
            }
            $params = [
                'menu' => $menu,
                'tags' => get_db_result("SELECT name FROM " . TAGS),
                'errors' => $_POST['errors']
            ];

            renderPages($page, $params);
            break;
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
