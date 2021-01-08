<?php
function reviews()
{
    $_SESSION['redirect'] = null;
    return [
        'layout' => 'layouts/main',
        'page' => 'reviews/reviews',
        'reviews' => get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC"),
        'admin' => isAccessUser(),
        'user' => getUser()['login']
    ];
}
