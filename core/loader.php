<?php
function load_content()
{
    $result_load = '';

    if ($_GET['dellAll'] === 'ok') {
        $res = update_db("DELETE FROM " . PICTURES);
        if ($res) {
            cleanDir(BIG);
            cleanDir(SMALL);
            header("Location: /gallery-main");
        }
    }

    if ($_GET['message'] === 'ok') {
        $result_load = file_get_contents(TEMPLATES . "gallery/log.php");
        $fp = fopen(TEMPLATES . "gallery/log.php", "w+");
        fwrite_stream($fp, '');
    }

    if ($_FILES['file']['name'][0]) {
        $result_load = '';
        for ($i = 0; count($_FILES['file']['name']) > $i; $i++) {
            $flag = false;
            $name = $_FILES['file']['name'][$i];
            $short_name = preg_replace('/.(jpg|jpeg|png)/', '', $name);
            $ext = $_FILES['file']['type'][$i];
            $link = $_FILES['file']['tmp_name'][$i];
            $size = $_FILES['file']['size'][$i];
            $path_big = BIG . $name;
            $path_small = SMALL . $name;
            $message = "Файл {$name} успешно загружен";

            if ($size > 1000000) {
                $flag = true;
                $message = "<p>Файл {$name} имеет слишком большой размер</p>";
            }
            if ($ext !== 'image/jpeg' && $ext !== 'image/png') {
                $flag = true;
                $message = "<p>Файл {$name} имеет неподдерживаемое расширение</p>";
            }
            if (!$flag) {
                if (move_uploaded_file($link, $path_big)) {
                    $image = new SimpleImage();
                    $image->load($path_big);
                    $image->resizeToWidth(250);
                    $image->save($path_small);
                    $result_load .= "<p>{$message}</p>";
                    update_db("INSERT INTO " . PICTURES . " VALUES ('0','{$short_name}','{$name}',0)");
                } else {
                    $result_load .= "<p>Ошбика при загрузке файла {$name}</p>";
                }
            } else {
                $result_load .= $message;
            }
        }
        $fp = fopen(TEMPLATES . "gallery/log.php", "w+");
        fwrite_stream($fp, $result_load);
        header("Location: /gallery-main?message=ok");
    }
    return $result_load !== '' ? $result_load : null;
}
