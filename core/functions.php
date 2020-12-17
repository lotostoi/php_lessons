<?php
require_once CORE_FOLDER . "chenge.php";

function renderTemlate($page, array $fields = [])
{
    extract($fields);
    ob_start();
    $fileName = TEMPLATES . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        echo "Error- template's file '{$fileName}' wasn't founded...";
    }
    return ob_get_clean();
}


