<section class="common wrapper">
    <div class="common-header__fone">
        <div class="common-header__cont">
            <h1 class="common-header__h1">Личный кабинет_</h1>
        </div>
    </div>
    <div class="common-body">
        <div class="auth-enter">
            <form class="person-area" id="enter" method="POST">
                <p class="title">Вход через социальные сети:</p>
                <div class="social-network">
                    <div class="list">
                        <button type="submit" name="sn" value="vk"><i class="fa fa-vk" aria-hidden="true"></i></button>
                        <button type="submit" name="sn" value="fb"><i class="fa fa-facebook-square" aria-hidden="true"></i></button>
                    </div>
                </div>
                <label class="save">
                    <p>Запомнить_:</p>
                    <input type="checkbox" name="save_sn" checked />
                </label>
                <hr />
                <p class="title">Вход через сайт:</p>
                <label class="login">
                    <p class="title-small">Введите логин или email_</p>
                    <input type="text" :class="error ? 'error' : ''" name="login" placeholder="Введите логин или email..." />
                    <?php if ($error) : ?>
                        <p class="message"><?= $error ?></p>
                    <?php endif; ?>
                </label>
                <label class="pass">
                    <p class="title-small">Введите пароль_</p>
                    <input type="password" :class="error ? 'error' : ''" name="password" placeholder="Введите пароль..." />
                    <?php if ($error) : ?>
                        <p class="message"><?= $error ?></p>
                    <?php endif; ?>
                </label>
                <a href="/auth/reg">Если вы еще не зарегистрированы, вам сюда</a>
                <label class="save">
                    <p>Запомнить_:</p>
                    <input type="checkbox" name="save" checked />
                    <input type="hidden" name="action" value="enter" />
                </label>
                <button name="sn" value="site">Войти</button>
            </form>
        </div>
    </div>
</section>