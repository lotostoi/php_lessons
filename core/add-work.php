<?php

function load_image()
{
    if ($_FILES['work-image']['name']) {
        $name = $_FILES['work-image']['name'][0];
        $short_name = preg_replace('/.(jpg|jpeg|png)/', '', $name);
        $ext = $_FILES['work-image']['type'][0];
        $link = $_FILES['work-image']['tmp_name'][0];
        $size = $_FILES['work-image']['size'][0];
        $path_big = BIG . $name;
        $path_small = SMALL . $name;
        if (move_uploaded_file($link, $path_big)) {
            $image = new SimpleImage();
            $image->load($path_big);
            $image->resizeToWidth(250);
            $image->save($path_small);
        } else {
            die("File hasn't loaded...");
        }
    }
    return $name;
}
function addWork()
{





}
