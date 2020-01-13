<!-- 
    Задание ко второму уроку
    1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
ноль можно считать положительным числом.
2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты
 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .cont {
            display: flex;
            width: 1000px;
            margin: 0 auto;
            flex-direction: column;
            border: 1px solid black;
        }

        .task1,
        .f1,
        .result1,
        .ts1,
        .ts2,
        .ts3 {
            width: 90%;
            margin: 10px auto;
            background-color: gray;
        }

        .span {
            margin-left: 50px;
            display: block
        }
    </style>
</head>

<body>
    <div class="cont">
        <div class="ts1">
            <h3 class="task1">Задание №1. Объявить две целочисленные переменные $a и $b и
                задать им произвольные
                начальные значения.
                Затем написать скрипт, который работает по следующему принципу:
                если $a и $b положительные, вывести их разность;
                если $а и $b отрицательные, вывести их произведение;
                если $а и $b разных знаков, вывести их сумму;
            </h3>

            <form class="f1" action="#">

                <label for="#">First Variable <input name="first" type="text"> </label>
                <label for="#">Second Variable <input name="second" type="text"> </label>
                <button type="submit" name="rethult"> Выполнить задание </button>

            </form>

            <?php
            error_reporting(0);
            $text1 = 'Разность введенных значений:  ';
            $text2 = 'Произведение введенных значений:  ';
            $text3 = 'Сумма введенных значений:  ';

            if ($_GET['first'] != null && $_GET['second'] != null) {

                $a =  $_GET['first'];
                $b =  $_GET['second'];

                if ($a >= 0 && $b >= 0) {
                    echo '<div class = "result1"> ' . $text1 . ($a - $b) . '</div>';
                }
                if ($a < 0 && $b < 0) {
                    echo '<div class = "result1"> ' . $text2 .  ($a * $b) . '</div>';
                }
                if ($a >= 0 && $b < 0 || $a < 0 && $b >= 0) {
                    echo '<div class = "result1"> ' . $text3  . ($a + $b) . '</div>';
                }
            } else {
                echo '<div class = "result1">  Введите значения переменных $a и $b </div>';
            }
            ?>
        </div>

        <div class="ts2">

            <h3 class="ts2">Задание №2. Присвоить переменной $а значение в промежутке [0..15].
                С помощью оператора switch организовать вывод чисел от $a до 15.
            </h3>
            <form class="f1" action="#">
                <label for="#">Input value $a <input name="valueATask2" type="text"> </label>
                <button type="submit" name="rethult"> Вывести значения </button>
            </form>
            <?php
            if ($_GET['valueATask2'] != null && $_GET['valueATask2'] >= 0 && $_GET['valueATask2'] < 16) {
                $a = (int) $_GET['valueATask2'];
                switch ($a) {
                    case 0:
                        echo '<span class = "span"> 0 </span>';
                    case 1:
                        echo '<span class = "span"> 1 </span>';
                    case 2:
                        echo '<span class = "span"> 2 </span>';
                    case 3:
                        echo '<span class = "span"> 3 </span>';
                    case 4:
                        echo '<span class = "span"> 4 </span>';
                    case 5:
                        echo '<span class = "span"> 5 </span>';
                    case 6:
                        echo '<span class = "span"> 6 </span>';
                    case 7:
                        echo '<span class = "span"> 7 </span>';
                    case 8:
                        echo '<span class = "span"> 8 </span>';
                    case 9:
                        echo '<span class = "span"> 9 </span>';
                    case 10:
                        echo '<span class = "span"> 10 </span>';
                    case 11:
                        echo '<span class = "span"> 11 </span>';
                    case 12:
                        echo '<span class = "span"> 12 </span>';
                    case 13:
                        echo '<span class = "span"> 13 </span>';
                    case 14:
                        echo '<span class = "span"> 14 </span>';
                    case 15:
                        echo '<span class = "span"> 15 </span>';
                }
            } else {
                echo '<div class = "result1">  Введите корректное значение переменной $a  </div>';
            }
            ?>
        </div>
        <div class="ts3">
            <h3 class="ts2">Задание №3. Реализовать основные 4 арифметические операции
                в виде функций с двумя параметрами.
                Обязательно использовать оператор return.
            </h3>
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
                return $a * $b;
            }
            echo '<pre> 
            function add($a, $b)
            {
                return $a + $b;
            }

            function sub($a, $b)
            {
                return $a - $b;
            }
           
            function mult ($a, $b)
            {
                return $a * $b;
            }
            
            function div ($a, $b)
            {
                return $a * $b;
            }              
            </pre>'

            ?>
        </div>
        <div class="ts3">
            <h3 class="ts2">Задание №4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
                где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
                В зависимости от переданного значения операции выполнить одну из арифметических операций
                (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
            </h3>
            <?php
            function mathOperation($arg1, $arg2, $operation)
            {
                switch ($operation) {
                    case 'сложение':
                        return  add($arg1, $arg2);
                        break;
                    case 'вычитание':
                        return  sub($arg1, $arg2);
                        break;
                    case 'умножение':
                        return  mult($arg1, $arg2);
                        break;
                    case 'деление':
                        return  div($arg1, $arg2);
                        break;
                    default:
                        return 'err';
                }
            }
            echo '<pre> 
            function mathOperation($arg1, $arg2, $operation) {
                switch ($operation) {
                    case "сложение":
                        return  add($arg1, $arg2);
                        break;
                    case "вычитание":
                        return  sub($arg1, $arg2);
                        break;
                    case "умножение":
                        return  mult($arg1, $arg2);
                        break;
                    case "деление":
                        return  div($arg1, $arg2);
                        break;
                    default:
                        return "err";
                }
            }
            </pre>'
            ?>
        </div>
        <div class="ts3">
            <h3 class="ts2"> Задание 6. *С помощью рекурсии организовать функцию возведения числа в степень.
                Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
            </h3>
            <form class="f1" action="#">

                <label for="#">Number <input name="number" type="text"> </label>
                <label for="#">Power <input name="power" type="text"> </label>
                <button type="submit" name="rethult"> Выполнить задание </button>

            </form>

            <?php
            function power($val, $pow)
            {
                function rec($val, $pow, $res)
                {
                    if ($pow == 0) {
                        return 1;
                    } elseif ($pow == 1) {
                        return $res;
                    } else {
                        $res = $res * $val;
                        $pow--;
                        return rec($val, $pow, $res);
                    }
                }
                $res = $val;
                return rec($val, $pow, $res);
            }
            if ($_GET['number'] != null && $_GET['power'] != null) {
                $val = (int) $_GET['number'];
                $pow = (int) $_GET['power'];
                $res =  power($val, $pow);
                echo '<div class = "result1"> ' . $res . '</div>';
            } else {
                echo '<div class = "result1">  Введите значениz переменных $val и $pow  </div>';
            }
            ?>
        </div>
        <div class="ts3">
            <h3 class="ts2"> Задание 7. * Написать функцию, которая вычисляет текущее
                время и возвращает его в формате с правильными склонениями, например:
                22 часа 15 минут, 21 час 43 минуты
            </h3>
            <?php
            function hoursOrMin($val, $arg)
            {
                if ($val == 0 || $val  > 4 && $val <= 20) {
                    ($arg == 'часы') ? $text = ' часов ' : $text = ' минут ';
                    echo '<span>'. $val . $text . '</span>';
                } elseif ($val % 10 > 1 && $val % 10 < 5) {
                    ($arg == 'часы') ? $text = ' часа ' : $text = ' минуты ';
                   echo '<span>'. $val . $text . '</span>';
                } elseif ($val % 10 == 0 || ($val % 10) > 4 && ($val % 10) <= 9) {
                    ($arg == 'часы') ? $text = ' часов' : $text = ' минут';
                   echo '<span>'. $val . $text . '</span>';
                } else {
                    ($arg == 'часы') ? $text = ' час ' : $text = ' минута ';
                   echo '<span>'. $val . $text . '</span>';
                }
            }

            function printCurrentTime()
            {
                $hours  = date('H');
                $min = date('i');
                echo '<h2 class = "span">';
                 hoursOrMin($hours, "часы"); 
                 hoursOrMin($min, "минуты");
                echo '</h2>' ;

            }

            printCurrentTime()

            ?>

        </div>
    </div>

</body>

</html>