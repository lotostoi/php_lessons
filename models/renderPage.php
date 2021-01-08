<?php


function renderPages(array $params)
{
    extract($params);
    if ($layout) {        
        $fields = [
            'header' => renderTemplate('header', $params),
            'content' => renderTemplate($page, $params),
            'footer' => renderTemplate('footer/footer', $params)
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

function renderTemplate($page, array $fields = [])
{   
    $fields['page'] = $page;
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