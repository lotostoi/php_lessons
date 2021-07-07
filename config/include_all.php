<?php
function include_all($dir)
{
    $files = array_slice(scandir($dir), 2);
    foreach ($files as $file) {
        include_once $dir . $file;
    }
}
