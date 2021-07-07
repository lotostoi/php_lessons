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
  
        <div class="menudb">
            <button class="creatDb"> Создать базу </button>
            <button class="dellAll"> Очистить базу </button>
        </div>

        <?php

        error_reporting(0);

        include "db.php";


        ?>
        <section class="galary">

            <?php
            $sort= mysqli_query($link, $query->sort_max_min('gallery', 'quantityShows'));
                while ($r = mysqli_fetch_assoc($sort)) {
                   $linkBig = json_decode($r['links'])->big; 
                   $data_id = json_decode($r['id']);
                   $list .=  "<img src='$linkBig' data-id='$data_id' class = 'img'>";
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
                        <img src="./sImg/0.jpg" alt="" class="big">
                    </div>
                    <p class = "quant"> Количество просмотров: 3  </p>
                </div>
            </div>

        </section>

    </div>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src='./index.js'></script>
</body>

</html>