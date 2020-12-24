<?php
function errors()
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
            foreach ($tags as $tag) {
                $id_work = connect_db()->insert_id; 
                var_dump($id_work);
                $id_tag = get_db_result("SELECT id FROM " . TAGS . " WHERE name = '{$tag}'")[0]['id'];
                update_db("INSERT INTO " . WORKS_TO_TAGS .  " VALUES ('0','{$id_work}','{$id_tag}')");
            }
        }
    }
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
