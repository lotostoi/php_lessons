<?php 

function getgallery()
{   $images = array_slice(scandir(BIG), 2);
    sort($images, SORT_NUMERIC | SORT_FLAG_CASE);
    $gallery =  [];
    foreach ($images as  $img) {
        $params = [
            'linkToBigImg' => BIG . $img,
            'linkToSmallImg' => SMALL . $img,
        ];
       array_push($gallery, $params);
    }
    return $gallery;
}

