
<?php
// *************************** Доп функции ***************************** // 
// *************************** Доп функции ***************************** // 
// *************************** Доп функции ***************************** // 
function getArrLinks($link)
{
    $arr = array_slice(scandir($link), 2);
    sort($arr, SORT_NUMERIC | SORT_FLAG_CASE);
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = $link . "/" . $arr[$i];
    }
    return $arr;
}

function getCombineArr($arr1, $arr2)
{
    $newArr = [];
    for ($i = 0; $i < count($arr1); $i++) {
        $newArr[$i] = [$arr1[$i], $arr2[$i]];
    }
    return $newArr;
}

function getArrSizeImg($linkToFollder)
{
    $newArr_ = [];
    $arrLinks_ = getArrLinks($linkToFollder);
    for ($i = 0; $i < count($arrLinks_); $i++) {
        $sizeImg = getimagesize($arrLinks_[$i]);
        preg_match_all('/[0-9]+/i', $sizeImg[3], $onliSizeImg, PREG_PATTERN_ORDER);
        $newArr_[$i] = $onliSizeImg[0];
    }
    return $newArr_;
}

function conv($val)
{
    return mysqli_real_escape_string($GLOBALS['link'], $val);
}

?>