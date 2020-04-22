<?php
include './models/Methods.class.php';
include "./models/config.php";
include "./models/Main.class.php";

$Meth = new Methods;

$db = DB::getInstance();
$db->setOptionsDB(SERVNAME, USERNAME, PASSWORD, DBNAME);
$link = $db->link;
$query = $db;

if (isset($_FILES['file'])) {

    $pictures = $_FILES['file'];

    foreach ($pictures['name'] as $key => $val) {

        // link to picture
        $link = $pictures['tmp_name'][$key];
        // pictire's extension
        $file_extension = end(explode('.', $pictures['name']["$key"]));
        // new name file  = last number file into dir + 1
        $new_name_picture = count($Meth->getArrDir('./BigImg'));

        move_uploaded_file($link, "./BigImg/" . $new_name_picture . "." . $file_extension);
        mysqli_query($db->link, $db->addOneRow_2(LINKS, null, "./BigImg/" . $new_name_picture . "." . $file_extension));
    }

    //print_r($pictures);
    header("Location:" . "index.php");
}

$gallery = $db->getArr(LINKS);


if ($_GET['page'] == "photo") {
    $id_photo = $_GET['id_photo'] - 1;
    $link = $gallery[$id_photo]['linkImg'];
    $page = 'photo';
    include './controll/viewMain.php';
} else {
    $page ='main';
    include './controll/viewMain.php';
}
