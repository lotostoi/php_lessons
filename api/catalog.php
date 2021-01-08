<?php
error_reporting(0);
$action = $_GET['action'] || null;
switch ($action) {
    case 'get':
        echo json_encode([
            'result' => 'ok',
            'catalog' => getCatalog()
        ]);
        break;

}