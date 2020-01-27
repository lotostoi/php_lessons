<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task №1</title>
</head>

<body>

    <form>
        <p> Введите две цифры и выберите оперпцию. </p>
        <div class="contener">
            <?php
            error_reporting(0);
            $x = isset ($_GET['firstNumber']) ? (int)$_GET['firstNumber']: '';
            $y = isset ($_GET['secondNumber']) ? (int)$_GET['secondNumber'] : '';                   
            ?>
            <input type="text" name="firstNumber" value="<?=$x?>">
            <select name="operation">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="text" name="secondNumber" value="<?=$y?>">
            <input type="submit" name="execute" value="Выполнить операцию">
            <hr>
            <?php

            if (isset($_GET['execute'])) {
                switch ($_GET['operation']) {
                    case "+":
                        echo  "<p> сумма введеных чисел = " .  ($x + $y) .  "</p>";
                        break;
                    case "-":
                        echo  "<p> разность введеных чисел = " . ($x - $y) .  "</p>";
                        break;
                    case "*":
                        echo  "<p> произведение введеных чисел = "  . ($x * $y) .  "</p>";
                        break;
                    case "/":
                        if ($y != 0) {
                            echo  "<p> Результа деления двух введеных чисел =" . ($x / $y) . "</p>";
                        } else {
                            echo "<p> На 0 нельзя делить </p>";
                        }
                        break;
                }
            }
            ?>
        </div>
    </form>

</body>

</html>