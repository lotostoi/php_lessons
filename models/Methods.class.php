<?php

class Methods {


    public function getArrDir($dir)
    {
        $images = scandir($dir);
        sort($images, SORT_NUMERIC | SORT_FLAG_CASE);
        $gallery = [];
        $k = 0;
        for ($i = 0; $i < count($images); $i++) {
            if (preg_match('/.jpg|.png/', $images[$i])) {
                array_push($gallery, array('id' => $k++, 'link' => $images[$i]));
            }
        }
        return $gallery;
    }



}
