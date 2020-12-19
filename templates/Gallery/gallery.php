<div class="gallery">
    <?php 
    foreach ($gallery as $image) : ?>
        <a href="<?= $image['linkToBigImg'] ?>" target="_blank" class="gallery__image">
            <img src="<?= $image['linkToSmallImg'] ?>" alt="name-img">
        </a>
    <?php
    endforeach;
    ?>
</div>