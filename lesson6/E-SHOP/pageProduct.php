
<?php 
$nameProduct = $_GET['name'];
?>

<div class="contProduct">


<img src="<?=$_GET['link']?>" alt='img' class='imgProduct'>
<h3 class="nameProduct"> <?=$nameProduct?> </h3>
<span class='priceProduct'> $ <?=$_GET['price']?> </span>
<p class="textProduct"><?=$_GET['text']?></p>  

</div>