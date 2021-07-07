<?php

function work() {
    $id = protect($_GET['id']); 
    return [
        'layout' => 'layouts/main',
        'page'=>'portfolio/work',
        'work'=> get_assoc_result("SELECT * FROM " . WORKS . " WHERE id=$id")[0],
        'errors' => $_POST['errors'],
        'admin' => isAccessUser(),
        'user' => getUser()['login']
    ];
}