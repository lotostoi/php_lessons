<?php
function resume() {
    return [
        'layout' => 'layouts/main',
        'page'=>'resume/resume',
        'user' => getUser()['login']
    ];
}