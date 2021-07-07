<div class="contProduct">
    <img src="<?= $_GET['link'] ?>" alt='img' class='imgProduct'>
    <h3 class="nameProduct"> <?= $_GET['name'] ?> </h3>
    <span class='priceProduct'> $ <?= $_GET['price'] ?> </span>
    <p class="textProduct"><?= $_GET['text'] ?></p>
    <button class="btnAddToCart"> Добавить в корзину </button>
</div>

<script>
    document.querySelector('.btnAddToCart').addEventListener('click', function () {    
        let params = new FormData();
        params.append('id_product', <?=$_GET['page'] ?>)
        params.append('id_user', <?=$_SESSION['id_user']?>)
        params.append('oper', '+')
        fetch('server.php', {
            method: 'post',
            body: params
        })
      /*   .then(function (response) {
                if (response.status == 200) {
                    location.reload()
                    return;
                }
            })  */

    })
</script>