<section class="reviews wrapper">
    <div class="reviews-header__fone">
        <div class="reviews-header__cont">
            <h1 class="reviews-header__h1">Добавить работу</h1>
        </div>
    </div>
    <div class="common-body">
        <div class="admin-catalog">
            <?php if ($_GET['result'] === 'ok') : ?>
                <p class="result_loader"> Работа была успешно добавлена!</p>
            <?php endif; ?>
            <form action="" enctype="multipart/form-data" class="admin-catalog__from" method="POST">

                <div class="form__img">
                    <div class="img">
                        <label for="">Load image:</label>
                        <input type="file" name="work-image[]">
                    </div>

                    <?php if ($_SESSION['errors']['load']) : ?>
                        <p class="form__message">Загрузите изображение</p>
                    <?php endif; ?>
                </div>

                <div class="form__tags">
                    <?php foreach ($tags as $tag) : ?>
                        <label>
                            <span><?= $tag['name'] ?></span>
                            <input type="checkbox" name="<?= '_tag_' . $tag['name'] ?>" value="<?php $_POST['_tag_' . $tag['name']]; ?>">
                        </label>
                    <?php endforeach; ?>
                    <?php if ($_SESSION['errors']['tags']) : ?>
                        <p class="form__message">Выберите теги!</p>
                    <?php endif; ?>
                </div>

                <div class="form__title">
                    <label>
                        <span>Title:</span>
                        <input type="text" name="title" value="<?= $_POST['title'] ?>">
                    </label>
                    <?php if ($_SESSION['errors']['title']) : ?>
                        <p class="form__messeage">Введите название!</p>
                    <?php endif; ?>
                </div>

                <div class="form__git">
                    <label>
                        <span>Link to git:</span>
                        <input type="text" name="git" value="<?= $_POST['git'] ?>">
                    </label>
                    <?php if ($_SESSION['errors']['git']) : ?>
                        <p class="form__message">Введите сылку...</p>
                    <?php endif; ?>
                </div>

                <div class="form__project">
                    <label>
                        <span>Link to project:</span>
                        <input type="text" name="project" value="<?= $_POST['project'] ?>">
                    </label>
                    <?php if ($_SESSION['errors']['project']) : ?>
                        <p class="form__message">Введите сылку...</p>
                    <?php endif; ?>
                </div>

                <div class="form__description">
                    <label>
                        <span>Description:</span>
                        <textarea type="text" name="description"><?= $_POST['description'] ?></textarea>
                    </label>
                    <?php if ($_SESSION['errors']['description']) : ?>
                        <p class="form__message">Введите описание...</p>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="start" value="1">
                <button type="submit">Add work</button>
            </form>
        </div>
    </div>
</section>