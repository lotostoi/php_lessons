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
    case 'get':
        $reviews =  get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
        if ($reviews) {
            sentReviews($reviews);
            die();
        } else {
            echo json_encode([
                'error' => 'Error of connection database'
            ]);
            die();
        }
    case 'add':
        $user = getUser()['login'];
        $link_to_sosial_network = getUser()['link_to_sosial_network'];
        $img_small =  getUser()['img_small'];
        $admin =  getUser()['admin'];
        $review = protect($_GET['review']);
        if ($review === "") {
            $_SESSION['error_review']['empty'] = true;
            header("Location: /reviews");
            die();
        }

        $res = execute("INSERT INTO " . REVIEWS . " VALUES ('0','{$user}','{$link_to_sosial_network}','{$review}','{$img_small}', {$admin})");
        if ($res) {
            $reviews = get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            header("Location: /reviews");
            die();
        }
        break;

    case 'delete':
        $id = (int) protect($_POST['id']);
        $res = execute("DELETE FROM " . REVIEWS . " WHERE id=$id ");

        if ($res) {
            $reviews = get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            sentReviews($reviews);
            die();
        }
        break;

    case 'edit':
        $review = protect($_POST['review']);
        $id = (int) protect($_POST['id']);
        $res = execute("UPDATE " . REVIEWS . " SET review = '$review'  WHERE id={$id}");
        if ($res) {
            $reviews = get_assoc_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            sentReviews($reviews);
            die();
        }
        break;
}
