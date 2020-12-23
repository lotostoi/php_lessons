<?php

switch ($_POST['operation']) {
    case 'add':
        $user = protect($_POST['user']);
        $review =  protect($_POST['review']);
        if ($review === "" || $user === "") {
            echo json_encode(['error' => 'Review or login are empty!']);
            die();
        }
        $res = update_db("INSERT INTO " . REVIEWS . " VALUES ('0','{$user}','{$review}')");
        if ($res) {
            $reviews = get_db_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            echo json_encode(['result' =>  'ok', 'reviews' => $reviews]);
        }
        break;

    case 'delete':
        $id = (int) protect($_POST['id']);
        $res = update_db("DELETE FROM " . REVIEWS . " WHERE id=$id ");

        if ($res) {
            $reviews = get_db_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            echo json_encode(['result' =>  'ok', 'reviews' => $reviews]);
        }
        break;
    case 'edit':
        $review = protect($_POST['review']);
        $id = (int) protect($_POST['id']);
        $res = update_db("UPDATE " . REVIEWS . " SET review = '$review'  WHERE id={$id}");
        if ($res) {
            $reviews = get_db_result("SELECT * FROM " . REVIEWS . " ORDER BY id DESC");
            echo json_encode(['result' =>  'ok', 'reviews' => $reviews]);
        }
        break;
}
