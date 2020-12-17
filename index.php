<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <div class="contener">


        <h2> Парсим картинки с сайта https://www.1zoom.ru/ </h2>

        <form action="#" method="POST">

            <label for="#" class="text"> Выберите на сайте <a href="https://www.1zoom.ru"> https://www.1zoom.ru</a> страницу с которой нужно спарсить картинки, и вставьте в форму ниже ссылку на эту страницу! </label>
            <input type="text" name="link" class="link">

            <div class="wrapper">
                <input type="submit" value="Cпарсить картинки" class="btn" name="pars">
                <input type="submit" value="Очистить папку с картинками" class="btn" name="dellImg">

            </div>

        </form>
        <?php

        error_reporting(0);

        include "del.php";

        if (isset($_POST['dellImg'])) {
            cleanDir('BigImg');
            cleanDir('SmollImg');
        }

        include 'parser.php';

        ?>
        <section class="galary">

            <?php

            $images = scandir('BigImg');
            sort($images, SORT_NUMERIC | SORT_FLAG_CASE);

            $dif = 0;
            for ($i = 0; $i < count($images); $i++) {
                $k = $i - $dif;
                if (preg_match('/.jpg/', $images[$i])) {
                    $list .=  "<img src='BigImg/$images[$i]' data-id='$k' class = 'img'>";
                } else {
                    $dif++;
                }
            }
            echo $list;
          
            ?>

            <!-- modal -->
            <div class="modal-overlay">
                <div class="modal">

                    <a class="close-modal">
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                        </svg>
                    </a>
                    <div class="modal-content">
                        <img src="./BigImg/0.jpg" alt="" class="big">
                    </div>

                </div>
            </div>

        </section>

    </div>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        var elements = $('.modal-overlay, .modal');

        document.querySelector('.galary').addEventListener('click', function(evt) {

            if (evt.target.dataset['id']) {

                let params = new FormData();

                params.append('id', `${evt.target.dataset['id'] + ".jpg"}`);

                fetch(`getSizeImg.php`, { // запрашиваем у сервера реальный размер картинки
                        method: 'POST', // и адаптируем его в соответсвии размером 
                        body: params // области просмотра
                    })
                    .then(data => data.json())
                    .then(data => {

                        let k = data.width / data.height

                        if (data.height > ($(window).height() * 90 / 100)) {

                            let height = $(window).height() * 90 / 100
                            let width = k * height
                            $('.big').attr("height", `${height}`)
                            $('.big').attr("width", `${width}`)
                            $('.modal').attr("style", `height: ${+height + 10}px; width: ${+width + 10}px;`)

                        } else {

                            $('.big').attr("height", `${data.height}`)
                            $('.big').attr("width", `${data.width}`)
                            $('.modal').attr("style", `height: ${+data.height + 10}px; width: ${+data.width + 10}px;`)

                        }

                        $('.big').attr("src", `./BigImg/${evt.target.dataset['id']}.jpg `)
                        elements.addClass('active');

                        $('.close-modal').click(function() {
                            elements.removeClass('active');
                        });
              })
            }
        })
    </script>
</body>

</html>