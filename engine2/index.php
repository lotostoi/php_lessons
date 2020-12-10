<?php

//TODO соберите страницу about полностью вместе с меню.

function renderTemlate($page, ...$params) {
    ob_start();
    include  "templates/" . $page . ".php";
    return ob_get_clean();
}

$menu = renderTemlate('menu');


echo renderTemlate('main', $menu);