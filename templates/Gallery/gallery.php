<div class="gallery">
    <?php
    foreach ($gallery as $image) : ?>
        <a href="./gallery-picture?id=<?=$image['id']?>"  class="gallery__image">
            <img src="<?= $image['linkToSmallImg'] ?>" alt="name-img">
        </a>
    <?php
    endforeach;
    ?>
</div>