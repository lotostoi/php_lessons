<?php
//error_reporting(0);
$x =  (float) $_POST['firstNumber'];
$y =  (float) $_POST['secondNumber'];
$operation = (string) $_POST['operation'];

$result = mathOperation($x, $y, $operation);
echo json_encode([
    'result' => "$result"
]);
