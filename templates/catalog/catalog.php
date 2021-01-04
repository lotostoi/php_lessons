<section class="portfolio wrapper">
    <div class="portfolio-header__fone">
        <div class="portfolio-header__cont">
            <h1 class="portfolio-header__h1">Мои проекты_</h1>
            <div class="portfolio-header__description">В данном разделе вы можете ознакомится с некотрыми из моих работ_</div>
        </div>
    </div>
    <div class="portfolio-header__body">
        <div class="filters">
            <label class="filter"><span class="title">Все работы: </span><input type="checkbox" name="all" id="filt_all" checked="checked" /></label>
            <label class="filter"><span class="title">html&css: </span><input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">js:</span> <input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">Vue.js: </span><input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">React</span> <input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">Node.js:</span> <input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">php: </span><input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">Laravel: </span><input type="checkbox" name="all" id="filt_all" /></label>
            <label class="filter"><span class="title">Sql</span> <input type="checkbox" name="all" id="filt_all" /></label> <button>Применить</button>
        </div>
    </div>
    <div class="portfolio-catalog">
        <?php if ($_GET['del'] === 'ok' && $admin) : ?>
            <p class="result_loader">Работа была удалена успешно...</p>
        <?php endif; ?>
        <?php if ($admin) : ?>
            <a href="/catalog/add" class="portfolio-catalog__outside">Add work</a>
        <?php endif; ?>
        <h1 class="portfolio-catalog__h1">Catalog</h1>
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