<?php
function menu()
{
    return [
        [
            'name' => 'main',
            'href' => '/',
            'value' => 'Главная'
        ],
        [
            'name' => 'calculator1',
            'href' => '/calculator1',
            'value' => 'calculator1'
        ],
        [
            'name' => 'calculator2',
            'href' => '/calculator2',
            'value' => 'calculator2'
        ],
        [
            'name' => 'reviews',
            'href' => '/reviews',
            'value' => 'reviews'
        ],
        [
            'name' => 'catalog',
            'href' => '/catalog/get',
            'value' => 'catalog'
        ],
        [
            'name' => 'addwork',
            'href' => '/catalog/add',
            'value' => 'addwork'
        ]
    ];
}

function compilateMenu($array)
{
    $menu = '<ul>';
    foreach ($array  as  $val) {
        $href = $val['href'];
        $name = $val['name'];
        $value = $val['value'];
        if (gettype($value) === 'array') {
            $menu .= "<li>";
            $menu .= "<a href='{$href}'>{$name}</a>";
            $menu .= compilateMenu($value);
            $menu .= "</li>";
        } else {
            $menu .= " <li><a href='{$href}'>{$name}</a></li>";
        }
    }
    $menu .= '</ul>';
    return $menu;
}
