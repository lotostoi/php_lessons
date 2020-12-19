<?php
function load_content()
{
    $result_load = '';
    if ($_GET['messag'] === 'ok') {
        $result_load = file_get_contents(TEMPLATES . "gallery/log.php");
        $fp = fopen(TEMPLATES . "gallery/log.php", "w+");
        fwrite_stream($fp, '');
    }
    if (!empty($_FILES)) {
        $result_load = '';
        for ($i = 0; count($_FILES['file']['name']) > $i; $i++) {
            $flag = false;
            $name = $_FILES['file']['name'][$i];
            $ext = $_FILES['file']['type'][$i];
            $link = $_FILES['file']['tmp_name'][$i];
            $error = $_FILES['file']['error'][$i];
            $size = $_FILES['file']['size'][$i];
            $path = BIG . $name;
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
                if (move_uploaded_file($link, $path)) {
                    $image = new SimpleImage();
                    $image->load(BIG . $name);
                    $image->resizeToWidth(250);
                    $image->save(SMALL . $name);
                    $result_load .= "<p>{$message}</p>";
                } else {
                    $result_load .= "<p>Ошбика при загрузке файла {$name}</p>";
                }
            } else {
                $result_load .= $message;
            }
        }
        $fp = fopen(TEMPLATES . "gallery/log.php", "w+");
        fwrite_stream($fp, $result_load);
        header("Location: /?page=gallery/main&messag=ok");
    }
    return $result_load !== '' ? $result_load : null;
}
