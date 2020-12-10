<?php

function renderTemlate($page, $fields = [])
{
    if (count($fields) > 0) {
        foreach ($fields as $key => $val) {
            $$key = $val;
        }
    }
    ob_start();
    include  "templates/" . $page . ".php";
    return ob_get_clean();
}

$fields = [
    'menu' => renderTemlate('menu'),
    'content' => renderTemlate('about')
];


echo renderTemlate('main', $fields);
