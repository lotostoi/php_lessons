<div class="catalog">
    <h1 class="catalog__h1">Catalog</h1>
    <div class="catalog__cont">
        <?php foreach ($catalog as $work) : ?>
            <div class="product">
                <div class="img">
                    <img src="<?= SMALL . $work['img'] . '.jpg' ?>" alt="">
                </div>
                <p class="title"> <?= $work['title'] ?></p>
                <div class="tags">
                    <span class="title">Tехнологии: </span>
                    <?php foreach ($work['tags'] as $tag) : ?>
                        <span><?= $tag ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="#" class="link">Подробнее...</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>