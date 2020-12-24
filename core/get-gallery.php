<?php

function getgallery()
{
    $images = get_db_result("SELECT * FROM " . PICTURES . " ORDER BY number_of_views DESC");
    return $images;

}
