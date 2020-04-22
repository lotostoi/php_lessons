<?php
    if (isset($_POST['id'])) {
        $name = $_POST['id'];
        $sizeImg = getimagesize("$name");
        preg_match_all('/[0-9]+/i', $sizeImg[3], $onliSizeImg, PREG_PATTERN_ORDER);
        echo json_encode( ['width'=> $onliSizeImg[0][0],'height'=> $onliSizeImg[0][1] ]);
    } 
?>