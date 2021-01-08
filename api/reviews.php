<?php
session_start();
error_reporting(0);
if (!empty($_GET['operation'])) {
    $operation = $_GET['operation'];
}
if (!empty($_POST['operation'])) {
    $operation = $_POST['operation'];
}
switch ($operation) {
    case 'add':
        $user = getUser()['login'];
        $link_to_sosial_network = getUser()['link_to_sosial_network'];
        $img_small =  getUser()['img_small'];
        $admin =  getUser()['admin'];
        $review = protect($_POST['review']);
        if ($review === "") {
            echo json_encode([
                'result' =>  'erorr',
            ]);
            die();
        }
        $res = execute("INSERT INTO " . REVIEWS . " VALUES ('0','{$user}','{$link_to_sosial_network}','{$review}','{$img_small}', {$admin})");
        $id = connect_db()->insert_id;
        if ($res) {
            echo json_encode([
                'result' => 'ok',
                'img_small' => $img_small,
                'link_network'=> $link_to_sosial_network,
                'user'=> $user,
                'review'=> $review,
                'id'=> $id
            ]);
            die();
        }
        break;

    case 'delete':
        $id = (int) protect($_POST['id']);
        $res = execute("DELETE FROM " . REVIEWS . " WHERE id=$id ");

        if ($res) {
            $reviews = get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            echo json_encode([
                'result' =>  'ok',
            ]);

            die();
        }
        break;

    case 'edit':
        $review = protect($_POST['review']);
        $id = (int) protect($_POST['id']);
        $res = execute("UPDATE " . REVIEWS . " SET review = '$review'  WHERE id={$id}");
        if ($res) {
            $reviews = get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            echo json_encode([
                'result' =>  'ok',
            ]);
            die();
        }
        break;
}
