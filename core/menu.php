<?php
function menu()
{
    return [
        [
            'name' => 'main',
            'href' => './',
            'value' => 'Главная'
        ],
        [
            'name' => 'portfolio',
            'href' => './portfolio',
            'value' => 'Портфолио'
        ],
        [
            'name' => 'gallery',
            'href' => './gallery-main',
            'value' => 'Галерея'
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
