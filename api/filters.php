<?php
error_reporting(0);
$action = $_POST['action'] || $_GET['action']  || null;
if ($_POST['action']) {
    $action = protect($_POST['action']);
}
if ($_GET['action']) {
    $action = protect($_GET['action']);
}

$tag = protect($_POST['tag']);
$id = $_GET['id'] ? protect($_GET['id']) : protect($_POST['id']);

switch ($action) {
    case 'add':
        if (!$tag) {
            echo json_encode([
                'error' => 'Назавние тега не может быть пустым...'
            ]);
            die();
        }

        $findTag = get_assoc_result("SELECT * FROM tags WHERE name='{$tag}'");
        if (count($findTag) > 0) {
            echo json_encode([
                'error' => 'Тег с таким название уже существует...'
            ]);
            die();
        }

        $add = execute("INSERT INTO tags VALUES ('0', '{$tag}')");
        $id = connect_db()->insert_id;
        if ($add) {
            echo json_encode([
                'result' => 'ok',
                'id' => $id
            ]);
        }
        break;

    case 'delete':
        $del = execute("DELETE FROM tags, works_to_tags USING tags, works_to_tags WHERE tags.id={$id} AND works_to_tags.id_tag={$id}");
        $del = $del ? $del : execute("DELETE FROM tags WHERE tags.id={$id}");
        echo json_encode(['result' => 'ok',]);
        break;

    case 'edit':
        $edit = execute("UPDATE tags SET name ='{$tag}' WHERE id={$id}");
        echo json_encode(['result' => 'ok']);
        break;
}
