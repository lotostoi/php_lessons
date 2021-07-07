<section class="common wrapper">
    <div class="common-header__fone">
        <div class="common-header__cont">
            <h1 class="common-header__h1">Личный кабинет_</h1>
        </div>
    </div>
    <div class="common-body">
        <div class="person-area">
            <form class="site" method="POST">
                <div class="img">
                    <img src="<?= $full_user['img_big'] ?>" alt="user-image" />
                </div>
                <div class="field">
                    <span class="title">Login:</span>
                    <span class="value"><?= $full_user['login'] ?></span>
                </div>
                <div class="field">
                    <span class="title">Имя:</span>
                    <span class="value"><?= $full_user['first_name'] ?></span>
                </div>
                <div class="field">
                    <span class="title">Фамилия:</span>
                    <span class="value"><?= $full_user['last_name'] ?></span>
                </div>
                <div class="field">
                    <span class="title">Email:</span>
                    <span class="value"><?= $full_user['email'] ?></span>
                </div>
                <input type="hidden" name="action" value="logout">
                <button class="exit">Выйти</button>
            </form>
        </div>
    </div>
</section>