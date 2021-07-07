<header class="wrapper header modif">
    <div class="header__cont modif">
        <nav class="header__nav">
            <div>
                <a href="/" class="modif">Главная</a>
                <a href="/resume" class="modif">Резюме</a>
                <a href="/portfolio/get" class="modif">Портфолио</a>
                <a href="/reviews" class="modif">Отзывы</a>
                <a href="#contacts" class="modif">Контакты</a>
            </div>
        </nav>
        <form action="" class="header__search">
            <input type="input" name="search" class="modif" /> <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <div class="header__login">
            <?php if (!$user) : ?>
                <a href="/authorization/enter" data-id="entre" class="modif">Войти</a>
            <?php else : ?>
                <a href="/authorization/logout" data-id="user" class="modif"><?=$user?></a>
            <?php endif; ?>
        </div>
    </div>
</header>