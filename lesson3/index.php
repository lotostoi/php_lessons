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

    // 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
    $i = 0;
    while ($i < 100) {
        if ($i % 3 == 0) {
            echo $i . '<br>';
        }
        $i++;
    }

    echo '<hr>';
    /* 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – ноль.
    1 – нечетное число.
    2 – четное число.
    3 – нечетное число.
    …
    10 – четное число. */
    $count2 = 0;

    do {
        if ($count2 === 0) {
            echo $count2 . ' ноль<br>';
        } elseif ($count2 % 2 === 0) {
            echo $count2 . ' четное число.<br>';
        } else {
            echo $count2 . ' нечетное число.<br>';
        }
        $count2++;
    } while ($count2 <= 10);

    echo '<hr>';
    /* 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, 
    а в качестве значений – массивы с названиями городов из соответствующей области.
    Вывести в цикле значения массива, чтобы результат был таким:
    Московская область:
    Москва, Зеленоград, Клин
    Ленинградская область:
    Санкт-Петербург, Всеволожск, Павловск, Кронштадт
    Рязанская область … (названия городов можно найти на maps.yandex.ru) */


    $ListRegions = [
        'Московская область' => ['Москва', ' Зеленоград', 'Клин'],
        'Ленинградская область' => ['Санкт-Петербург', ' Павловск', 'Кронштадт'],
        'Рязанская область' => ['Рыбное', 'Кораблино', 'Скопин', 'Шацк']
    ];

    foreach ($ListRegions as $key => $val) {
        echo $key . ': <br>';
        $i = 0;
        foreach ($val as $city) {
            $i++;
            $text = '';
            $i == count($val) ? $text = $city . '<br>' : $text = $city . ', ';
            echo $text;
        }
    }

    echo '<hr>';
    /* 4. Объявить массив, индексами которого являются буквы русского языка, 
    а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, 
    ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
    Написать функцию транслитерации строк. */

    $converter = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',    'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        ' ' => ' '
    ];

    function convert($str, $decoder)
    {
        $newStr = '';
        $arrString = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($arrString as $val) {
            foreach ($decoder as $key => $code) {
                if ($val == $key) {
                    $newStr .= $code;
                }
            }
        }
        echo $newStr;
    }
    convert('Объявить массив, индексами которого являются буквы русского языка', $converter);

    echo '<hr>';
    /* 5. Написать функцию, которая заменяет в строке пробелы
     на подчеркивания и возвращает видоизмененную строчку. */
    function replacement($str, $simvol)
    {
        $newStr = '';
        $arrString = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($arrString as $val) {

            if ($val == $simvol) {
                $newStr .= '_';
            } else {
                $newStr .= $val;
            }
        }
        echo $newStr;
    }
    replacement('Объявить массив, индексами которого являются буквы русского языка', ' ');

    echo '<hr>';
    /* 7. *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла.
     То есть выглядеть должно так:for (…){ // здесь пусто} */
    for ($i = 0; $i < 10; print ($i++) . '<br>') {
    }

    echo '<hr>';
    /* 8. *Повторить третье задание, но вывести на экран только города, 
    начинающиеся с буквы «К».*/

    $ListRegions = [
        'Московская область' => ['Москва', 'Зеленоград', 'Клин', 'Коломна', 'Луховицы'],
        'Ленинградская область' => ['Санкт-Петербург', 'Павловск', 'Кронштадт', 'Кингисепп', 'Кировск'],
        'Рязанская область' => ['Рыбное', 'Кораблино', 'Скопин', 'Шацк']
    ];

    function checkFirtsSimvol($str, $sim)
    {
        $newStr = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        $newStr[0] == $sim ? $rethult = true : $rethult = false;
        return $rethult;
    }

    function QuantWordsIfFirstSim($arr, $sim)
    {
        $k = 0;
        foreach ($arr as $val) {
            if (checkFirtsSimvol($val, $sim)) {
                $k++;
            }
        }
        return $k;
    }

    //echo QuantWordsIfFirstSim(['Москва', 'Зеленоград', 'Клин', 'Коломна', 'Луховицы'], 'К');


    foreach ($ListRegions as $key => $val) {
        echo $key . ': <br>';
        $i = 0;
        $text = '';
        foreach ($val as $city) {
            if (checkFirtsSimvol($city, 'К')) {
                if ($i == 0 && $i == QuantWordsIfFirstSim($val, 'К') - 1) {
                    $text = $city . '.' . '<br>';
                } elseif ($i == 0) {
                    $text = $city;
                } elseif ($i > 0 && $i < QuantWordsIfFirstSim($val, 'К') - 1) {
                    $text .= ', ' . $city;
                } else {
                    $text .= ', ' . $city . '.' . '<br>';
                }
                $i++;
            }
        }
        echo $text;
    }

    echo '<hr>';
    /*  9. *Объединить две ранее написанные функции в одну, 
    которая получает строку на русском языке, производит 
    транслитерацию и замену пробелов на подчеркивания 
    (аналогичная задача решается при конструировании url-адресов
    на основе названия статьи в блогах).*/

    $converter_ = $converter;
    $converter_[' '] = '_';
    convert('Объявить массив, индексами которого являются буквы русского языка', $converter_);
    ?>



</body>

</html>