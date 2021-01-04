<section class="reviews wrapper">
    <div class="reviews-header__fone">
        <div class="reviews-header__cont">
            <h1 class="reviews-header__h1"><?= $work['title'] ?>_</h1>

        </div>
    </div>
    <div class="common-body">
        <div class="work">
            <?php if ($_GET['result'] === 'ok'  && $admin) : ?>
                <p class="result_loader"> Работа была успешно отредактированна!</p>
            <?php endif; ?>
            <?php if ($admin) : ?>
                <a href="./catalog/edit?id=<?= $work['id'] ?>&order=1" class="link__outside">Edit this work</a>
            <?php endif; ?>
            <div class="work__img">
                <img src="<?= BIG . $work['img'] ?>" alt="name" class="big-picture__img">
            </div>
            <h1 class="work__title"><?= $work['title'] ?></h1>
            <p class="work__description"><?= $work['description'] ?></p>
            <a href="<?= $work['git'] ?>" class="work__a">Посмотреть код.. </a>
            <a href="<?= $work['project'] ?>" class="work__a">Посмотреть проект...</a>
        </div>
    </div>
</section>