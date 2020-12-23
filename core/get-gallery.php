<?php

function getgallery()
{
    $images = get_db_result("SELECT * FROM " . PICTURES . " ORDER BY number_of_views DESC");
    $gallery = [];
    foreach ($images as  $img) {
        $params = [
            'id' => $img['id'],
            'linkToBigImg' => BIG . $img['name_and_ext'],
            'linkToSmallImg' => SMALL . $img['name_and_ext'],
        ];
        array_push($gallery, $params);
    }
    return $gallery;
}
