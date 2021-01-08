<section class="common wrapper">
    <div class="common-header__fone">
        <div class="common-header__cont">
            <h1 class="common-header__h1">Личный кабинет_</h1>
        </div>
    </div>
    <div class="common-body">
        <div class="auth-enter">
            <div class="person-area" id="enter">
                <p class="title">Вход через социальные сети:</p>
                <div class="social-network">
                    <div class="list">
                        <form action="../api/auth-vk" method="POST">
                            <input type="hidden" name="start" value="1">
                            <input type="hidden" name="save_sn" value="1" id ="vk_save" >
                            <input type="hidden" name="redirect" value="authorization/logout">
                            <button type="submit" name="sn" value="vk" method="POST">
                                <i class="fa fa-vk" aria-hidden="true"></i>
                            </button>
                        </form>
                        <form action="../api/auth-fb" method="POST">
                            <input type="hidden" name="start" value="1">
                            <input type="hidden" name="redirect" value="authorization/logout">
                            <input type="hidden" name="save_sn" value="1" id ="fb_save" >
                            <button type="submit" name="sn" value="fb">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <label class="save">
                    <p>Запомнить_:</p>
                    <input type="checkbox" name="save_sn" checked id="checked_network"/>
                </label>
                <hr />
                <form action="../api/auth" class="site" method="POST">
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
                        <input type="hidden" name="redirect" value="authorization/logout">
                        <input type="checkbox" name="save" checked />
                        <input type="hidden" name="action" value="enter" />
                    </label>
                    <button name="sn" value="site">Войти</button>
                </form>
            </div>
        </div>
    </div>
</section>