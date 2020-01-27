<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task №2</title>
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

            <input type="text" name="firstNumber" value="<?= $x ?>" style = "width:50px;">
            <input type="text" name="secondNumber" value="<?= $y ?>" style = "width:50px;">
            <hr>
            <input type="submit" value="+" name="+">
            <input type="submit" value="-" name="-">
            <input type="submit" value="*" name="*">
            <input type="submit" value="/" name="/">
            <hr>

            <?php        
            if (isset($_GET['+'])) {
                echo  "<p> сумма введеных чисел = " .  ($x + $y) .  "</p>";
            }
            if (isset($_GET['-'])) {
                echo  "<p> разность введеных чисел = " . ($x - $y) .  "</p>";
            }
            if (isset($_GET['*'])) {
                echo  "<p> произведение введеных чисел = "  . ($x * $y) .  "</p>";
            }
            if (isset($_GET['/'])) {
                if ($y != 0) {
                    echo  "<p> Результа деления двух введеных чисел =" . ($x / $y) . "</p>";
                } else {
                    echo "<p> На 0 нельзя делить </p>";
                }
            }
            ?>
            <hr>
        </div>
    </form>

</body>

</html>