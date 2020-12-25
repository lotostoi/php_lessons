<?php
function catalogActions($action)
{
    $params = [];
    $menu = compilateMenu(menu());
    switch ($action) {
        case 'get':
            $params = [
                'menu' => $menu,
                'catalog' => getCatalog()
            ];
            break;
        case 'add':
            check_form();
            if (count($_SESSION['errors']) === 0 && $_POST['title']) {
                addWork();
            }
            $params = [
                'menu' => $menu,
                'tags' => get_db_result("SELECT name FROM " . TAGS),
                'errors' => $_POST['errors']
            ];
            break;
        case 'edit':
            $id = $_GET['id'];
            getCheckedTags();
            $params = [
                'menu' => $menu,
                'tags' => get_db_result("SELECT name FROM " . TAGS),
                'checked' => getCheckedTags(),
                'errors' => $_POST['errors']
            ];
            break;
        case 'delete':
            deleteWork();
            break;
    }
    return $params;
}

function getCheckedTags()
{
    $id = $_GET['id'];
    $ids_checked_tags = get_db_result("SELECT id_tag FROM " . WORKS_TO_TAGS . " WHERE id_work=$id");
    $checked = [];
    foreach ($ids_checked_tags as $id) {
        $id = $id['id_tag'];
        $tag = get_db_result("SELECT name FROM " . TAGS . " WHERE id=$id")[0]['name'];
        $checked[$tag] = true;
    }
    return $checked;
}

function deleteWork()
{
    if ($_GET['id']) {
        $id = $_GET['id'];
        $delete = update_db("DELETE FROM " . WORKS . " WHERE id=$id");
        if ($delete) {
            $delete = update_db("DELETE  FROM " . WORKS_TO_TAGS . " WHERE id_work=$id");
            if ($delete) {
                header("Location: /catalog/get?del=ok");
            }
        }
    }
}


function getCatalog()
{
    $catalog = get_db_result("SELECT * FROM " . WORKS . " ORDER BY id DESC");
    foreach ($catalog as $key => $work) {
        $id = $work['id'];
        $id_tags =  get_db_result("SELECT id_tag FROM " . WORKS_TO_TAGS . " WHERE id_work = $id");
        $tags = [];
        foreach ($id_tags as $tag) {
            $id_t = $tag['id_tag'];
            $tag_value = get_db_result("SELECT name FROM " . TAGS . " WHERE id = $id_t")[0]['name'];
            $tags[] = $tag_value . ',';
        }
        $inx = count($tags) - 1;
        $tags[$inx] = str_replace(',', '.', $tags[$inx]);
        $catalog[$key]['tags'] = $tags;
    }
    return $catalog;
}
function check_form()
{
    $errors = [];
    if (!$_SESSION['errors']) {
        session_start();
    }
    if ($_POST['start']) {
        if ($_FILES['work-image']['name'][0] === '') {
            $errors['load'] = true;
        }
        if (count(getTags()) === 0) {
            $errors['tags'] = true;
        }
        if (empty($_POST['title'])) {
            $errors['title'] = true;
        }
        if (empty($_POST['git'])) {
            $errors['git'] = true;
        }
        if (empty($_POST['project'])) {
            $errors['project'] = true;
        }
        if (empty($_POST['description'])) {
            $errors['description'] = true;
        }
    }
    $_SESSION['errors'] = $errors;
}

function addWork()
{
    $title = protect($_POST['title']);
    $git = protect($_POST['git']);
    $img = load_image();
    $project = protect($_POST['project']);
    $description = protect($_POST['description']);
    if ($title !== '' && $project !== '') {
        $add = update_db("INSERT INTO " . WORKS .  " VALUES ('0','{$title}','{$img}','{$git}','{$project}','{$description}')");
        if ($add) {
            $tags = getTags();
            $id_work = connect_db()->insert_id;
            foreach ($tags as $tag) {
                $id_tag = get_db_result("SELECT id FROM " . TAGS . " WHERE name = '{$tag}'")[0]['id'];
                update_db("INSERT INTO " . WORKS_TO_TAGS .  " VALUES ('0','{$id_work}','{$id_tag}')");
            }
        }
    }
    header("Location: /addwork/add?result=ok");
}

function load_image()
{
    $name = false;
    if ($_FILES['work-image']['name'][0] !== '') {
        $name = $_FILES['work-image']['name'][0];
        $short_name = preg_replace('/.(jpg|jpeg|png)/', '', $name);
        $ext = $_FILES['work-image']['type'][0];
        $link = $_FILES['work-image']['tmp_name'][0];
        $size = $_FILES['work-image']['size'][0];
        $path_big = BIG . $name;
        $path_small = SMALL . $name;
        if (move_uploaded_file($link, $path_big)) {
            $image = new SimpleImage();
            $image->load($path_big);
            $image->resizeToWidth(250);
            $image->save($path_small);
        } else {
            $name = false;
        }
    }
    return $name;
}
function getTags()
{
    $tags = [];
    foreach ($_POST as $key => $val) {
        if (strpos($key, '_tag_') !== false) {
            $tags[] = str_replace('_', '.', str_replace('_tag_', '', $key));
        }
    }
    return $tags;
}
