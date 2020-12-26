<div class="work">
<?php if ($_GET['result'] === 'ok') : ?>
        <p class="result_loader"  > Работа была успешно отредактированна!</p>
    <?php endif; ?>
    <a href="./catalog/edit?id=<?= $work['id'] ?>&order=1" class="link__outside">Edit this work</a>
    <div class="work__img">
        <img src="<?= BIG . $work['img'] ?>" alt="name" class="big-picture__img">
    </div>
    <h1 class="work__title"><?= $work['title'] ?></h1>
    <p class="work__description"><?= $work['description'] ?></p>
    <a href="<?= $work['git'] ?>" class="work__a">Посмотреть код.. </a>
    <a href="<?= $work['project'] ?>" class="work__a">Посмотреть проект...</a>
</div>