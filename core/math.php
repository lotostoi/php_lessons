<?php
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
    return $b === 0 ? "Error -  dividing on zero!" :  $a / $b;
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
