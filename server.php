<?php

error_reporting(0);
include 'dbinit.php';

if (isset($_POST['id'])) {
    $id_db = (int) $_POST['id'];
    $res = mysqli_query($link, $query->select_id("$id_db", 'size', 'gallery'));
    mysqli_query($link, $query->incPole("$id_db", 'gallery', 'quantityShows'));
    $quant = mysqli_query($link, $query->select_id("$id_db", 'quantityShows', 'gallery'));
    $quantShow = mysqli_fetch_assoc($quant)['quantityShows'];
    $size = json_decode(mysqli_fetch_assoc($res)['size']);
    $width = $size->width;
    $height = $size->height;
    echo json_encode(['width' => $width, 'height' => $height, 'quant' => $quantShow]);
    mysqli_close($link);
}
