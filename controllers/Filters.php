<?php
function filters() {  
    blockedPage();
    return [
        'layout' => 'layouts/main',
        'page'=>'admin/portfolio/filters',
        'tags' => get_assoc_result("SELECT * FROM tags"),
        'user' => getUser()['login']
    ];
}