<?php

function renderTemplate($page, array $fields = [])
{
    extract($fields);
    ob_start();
    $fileName = TEMPLATES . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        echo "Error - template's file '{$fileName}' wasn't founded...";
    }
    return ob_get_clean();
}

function api($page)
{
    $fileName = API . $page . ".php";
        include $fileName;

}

function fwrite_stream($fp, $string)
{
    for ($written = 0; $written < strlen($string); $written += $fwrite) {
        $fwrite = fwrite($fp, substr($string, $written));
        if ($fwrite === false) {
            return $written;
        }
    }
    return $written;
}
function cleanDir($dir)
{
    $files = glob($dir . "/*");
    if (count($files) > 0) {
        foreach ($files as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }
}
function set_atr_selected($operation, $name_operation)
{
    return $operation === $name_operation ? "selected" : "";
}
