<?php

include 'addfunctions.php';
include 'dbinit.php';

// работа кнопки очистить базу данных
if (isset($_POST['dellAll'])) {
    mysqli_query($link, $query->dellAll('gallery')) or die("Ошибка" .  mysqli_error($link));
}
// работа кнопки запонить базу данных
if (isset($_POST['creatDb'])) {

    // получаем  объединенный массив путей к картинкам, в папках по именам папок;
    $liksImages = getCombineArr(getArrLinks('bImg'), getArrLinks('sImg'));

    // получаем массив размеров больших картинок;
    $sizesImeges = getArrSizeImg('bImg');

    for ($i = 0; $i < count($liksImages); $i++) {

        $id = conv("$i");
        $name = conv("$i" . ".jpg");
        $links = conv(json_encode(['big' => $liksImages[$i][0], 'small' => $liksImages[$i][1]]));
        $size = conv(json_encode(['width' => $sizesImeges[$i][0], 'height' => $sizesImeges[$i][1]]));
        $quant  = conv('0');

        mysqli_query($link, $query->addOneRow($id, $name, $links, $size, $quant, 'gallery'))
            or die("<p>Ошибка записи в базу данных. Возможно в ней уже есть данные. </p>" .  mysqli_error($link));

        echo "<p> База данных на сонове фалов лежащих в папках 'bImg' и 'sImg' сформирована. Записано $i значений! </p>";
    }
}

?>

