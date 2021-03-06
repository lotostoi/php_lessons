<?php

$menu = [
    [
        'name' => 'main',
        'href' => './',
        'value' => 'Главная'
    ],
    [
        'name' => 'portfolio',
        'href' => './?page=portfolio',
        'value' => 'Портфолио'
    ],
    [
        'name' => 'gallery',
        'href' => './?page=Gallery/gallery',
        'value' => 'Галерея'
    ]
];

function renderMenu($array)
{
    $menu = '';
    foreach ($array  as  $val) {
        $href = $val['href'];
        $name = $val['name'];
        $value = $val['value'];
        if (gettype($value) === 'array') : ?>
            <li>
                <a href='<?= $href ?>'><?= $name ?></a>
                <ul><?= renderMenu($value) ?></ul>
            </li>
        <?php
        else : ?>
            <li><a href='<?= $href ?>'><?= $name ?></a></li>
<?php
        endif;
    }

    return $menu;
}
?>
<header class="header">
    <nav class="header__nav">
        <ul>
            <?= renderMenu($menu) ?>
        </ul>
    </nav>
</header>