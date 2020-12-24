<div class="gallery">
    <?php
    foreach ($gallery as $image) : ?>
        <a href="./picture?id=<?= $image['id'] ?>" class="gallery__image">
            <img src="<?= SMALL . $image['name_and_ext'] ?>" alt="name-img">
        </a>
    <?php
    endforeach;
    ?>
</div>