<?php
session_start();
error_reporting(0);
include "dbinit.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <title>Document</title>
</head>

<body>
    <div class="contener">
        <header class="header">
            <h1 class="header__h1"><a href="E-Shop.php?page=main" class="header__a">E-SHOP </a></h1>
            <ul class="header__ul">
                <li class="header__li"><a href="E-Shop.php?page=main" class="header__a">Main</a></li>
                <li class="header__li"><a href="#" class="header__a">Home</a></li>
                <li class="header__li"><a href="#" class="header__a">About Us</a></li>
                <li class="header__li"><a href="#" class="header__a">Products</a></li>
                <li class="header__li"><a href="feedBackForm.php" class="header__a">Reviews</a></li>
            </ul>
            <form action="input.php" method="POST">

                <?php
                if ($_SESSION['user']) { ?>
                    <a href="E-Shop.php?page=entrance" class="header__a"><?= $_SESSION['user'] ?> </a>
                <?php

                } else { ?>
                    <a href="E-Shop.php?page=entrance" class="header__a"> Войти </a>
                <?php
                }
                ?>
            </form>
            <div class="contCart">
                <div class="CartSvg">
                    <svg width="19" height="17">
                        <path d="M18.000,4.052 L17.000,7.040 C16.630,7.878 16.105,9.032 15.000,9.032 L5.360,9.032 L5.478,10.028 L18.000,10.028 L17.000,12.019 L4.352,12.019 L3.709,12.095 L2.522,2.061 L1.000,2.061 C0.448,2.061 -0.000,1.615 -0.000,1.066 C-0.000,0.515 0.352,0.008 0.905,0.008 L4.291,-0.006 L4.545,2.145 C4.670,2.096 4.812,2.061 5.000,2.061 L17.000,2.061 C18.105,2.061 18.000,2.953 18.000,4.052 ZM6.000,13.015 C7.105,13.015 8.000,13.906 8.000,15.007 C8.000,16.107 7.105,16.998 6.000,16.998 C4.895,16.998 4.000,16.107 4.000,15.007 C4.000,13.906 4.895,13.015 6.000,13.015 ZM14.000,13.015 C15.105,13.015 16.000,13.906 16.000,15.007 C16.000,16.107 15.105,16.998 14.000,16.998 C12.896,16.998 12.000,16.107 12.000,15.007 C12.000,13.906 12.896,13.015 14.000,13.015 Z" />
                    </svg>
                </div>
                <span class="spanCart">Cart</span>
                <span class="countCart"> 5 </span>
                <div class="contCartProducts">
                    <div class="contCartProducts__bodyCart">

                        <?php
                        $arr = getArr($link, CART);
                        $i = 0;
                        foreach ($arr as $key => $val) {
                            if ($val['id_user'] == $_SESSION['id_user']) {
                                $newArr[$i++] = $arr["$key"]["id"];
                            }
                        }
                        foreach ($newArr as $key => $val) {
                            $res = mysqli_query($link, $query->select_row(CART, 'id', $val));
                            $str = mysqli_fetch_assoc($res);
                            $quant = $str['quantity'];
                            $id = $str['id_product'];
                            $res_pr = mysqli_fetch_assoc(mysqli_query($link, $query->select_row_id($id, COTALOG)));
                            $name_cart = $res_pr['name'];

                            $price_cart = $res_pr['price'];
                            $link_img_cart = $res_pr['linkImg'];
                        ?>
                            <div class="contCartProducts__contItem">
                                <img src="<?= $link_img_cart ?>" width="100" height="150" alt="imgProduct" class="contCartProducts__img">
                                <span class="contCartProducts__name"><?= $name_cart ?></span>
                                <span class="contCartProducts__price">$<?= $price_cart * $quant ?></span>
                                <span class="contCartProducts__quantity" ><?= $quant ?></span>
                                <div class="contCartProducts__buttons">
                                    <button @click="$parent.addItemInCart(prod)" class="contCartProducts__add">&#9650</button>
                                    <button @click="$parent.delItemInCart(prod)" data-id="<?= $id ?>" class="contCartProducts__del">&#9660</button>
                                </div>
                            </div>
                        <?php

                        }
                        ?>



                        <div class="contCartProducts__rethult">
                            <span class="contCartProducts__span">Итого:</span>
                            <span class="contCartProducts__allSumm">$ 5</span>
                            <span class="contCartProducts__allQuantity">6</span>
                            <button @click="cleanCart" class="contCartProducts__allClean">
                                X
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="cotalog">

            <?php

            if ($_GET['page'] == "main" || !$_GET['page']) {
                require('buildPageShop.php');
            } elseif ($_GET['page'] == "entrance") {
                require('entrance.php');
            } elseif ($_GET['page'] == "reg") {
                require('reg.php');
            } else {
                require('pageProduct.php');
            }



            ?>

        </section>
    </div>
    <script>
        document.querySelector('.CartSvg').onclick = () => {
            document.querySelector('.contCartProducts').classList.toggle('contCartProducts-active');
        }
        document.querySelector('.contCartProducts__bodyCart').addEventListener('click', (evt) => {
            if (evt.target.className == 'contCartProducts__del') {
                let paramss = new FormData();
                paramss.append('id_product', evt.target.dataset['id'])
                paramss.append('id_user', <?= $_SESSION['id_user'] ?>)
                paramss.append('oper', '-')
                fetch('server.php', {
                        method: 'post',
                        body: paramss
                    })
                    .then(data => data.json())
                    .then((data) => {
                        if (data.res == "-") {

                        }
                    })


            }



        })
    </script>
</body>

</html>