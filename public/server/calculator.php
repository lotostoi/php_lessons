<?php
error_reporting(0);
function add($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function mult($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    return (int) $b === 0 ? "Error -  dividing on zero!" :  $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return  add($arg1, $arg2);
            break;
        case '-':
            return  sub($arg1, $arg2);
            break;
        case '*':
            return  mult($arg1, $arg2);
            break;
        case '/':
            return  div($arg1, $arg2);
            break;
        default:
            return 'err';
    }
}
$x =  (float) $_POST['firstNumber'];
$y =  (float) $_POST['secondNumber'] ;
$operation = (string) $_POST['operation'];

$result = mathOperation($x, $y, $operation);
echo json_encode(['result' => $result]);
