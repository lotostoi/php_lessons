<section class="common wrapper">
    <div class="common-header__fone">
        <div class="common-header__cont">
            <h1 class="common-header__h1">Мои работы_</h1>
            <div class="common-header__description">
                В этома разделе вы можете посомтреть некоторые мои работы_
            </div>
        </div>
    </div>
    <div class="portfolio-header__body">
        <div class="filters" id="pf_tags">
   
            <label class="filter" data-name="all">
                <span class="title" data-name="all">Все работы: </span>
                <input type="checkbox" name="all" data-name="all" checked="checked" />
            </label>
            <?php foreach ($tags as $tag) : ?>
            <label class="filter">
                <span class="title"><?= $tag['name'] ?>: </span>
                <input type="checkbox" name="<?= $tag['name'] ?>" />
            </label>
            <?php endforeach; ?>
            <button id="pf_filter">Применить</button>
        </div>
    </div>
    <div class="portfolio-catalog">
        <?php if ($_GET['del'] === 'ok' && $admin) : ?>
            <p class="result_loader">Работа была удалена успешно...</p>
        <?php endif; ?>
        <?php if ($admin) : ?>
            <a href="/portfolio/add" class="portfolio-catalog__outside-work">Add work</a>
            <a href="/filters" class="portfolio-catalog__outside-filters">Edit filters</a>
        <?php endif; ?>
        <div class="portfolio-catalog__cont">
            <?php foreach ($catalog as $work) : ?>
                <div class="product">
                    <div class="img">
                        <img src="<?= '/' . SMALL . $work['img']  ?>" alt="">
                    </div>
                    <p class="title"> <?= $work['title'] ?></p>
                    <div class="tags">
                        <span class="title">Tехнологии: </span>
                        <?php foreach ($work['tags'] as $tag) : ?>
                            <span><?= $tag ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="/work?id=<?= $work['id'] ?>" class="link">Подробнее...</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>