<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>



    <?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);                               // Почему true?
    echo 'при не строгом сравнении происходит преообразование типов' . '<br>' . '<br>';
    var_dump((int) '012345');                         // Почему 12345?
    echo '(int) преобразовывает строку к числу ' . '<br>' . '<br>';
    var_dump((float) 123.0 === (int) 123.0);          // Почему false?
    echo 'значения разных типов не могут быть равны при строгом сравнении ' . '<br>' . '<br>';
    var_dump((int) 0 === (int) 'hello, world');      // Почему true?
    echo '(int) пеобразует строку нечинающюся на цифру в число 0' . '<br>' . '<br>';
    ?>
   
     

    <?php

     echo '*Используя только две переменные, поменяйте их значение местами. 
     Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2. 
     Дополнительные переменные использовать нельзя.';

    $a = 1;
    $b = 2;

    $b = $b + $a;
    $a = $b - $a;
    $b = $b - $a;
    
    echo '<br>';
    echo 'a ='.$a;
    echo '<br>';
    echo 'b ='.$b;


    ?>

</body>

</html>
