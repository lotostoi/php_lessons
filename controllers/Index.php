<?php 
function index() {
    return [
        'layout' => 'layouts/main',
        'page'=>'index',
        'user' => getUser()['login']
    ];
}