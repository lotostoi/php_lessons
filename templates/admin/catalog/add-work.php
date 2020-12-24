<div class="admin-catalog">
    <form action="" enctype="multipart/form-data" class="admin-catalog__from" method="POST">
        <div class="form__img">
            <label for="">Load image</label>
            <input type="file" name="work-image[]">
        </div>
        <div class="form__tags">
            <?php foreach ($tags as $tag) : ?>
                <label>
                    <span><?= $tag['name'] ?></span>
                    <input type="checkbox" name="<?= '_tag_' . $tag['name'] ?>">
                </label>
            <?php endforeach; ?>
        </div>
        <div class="form__title">
            <label>
                <span>Title:</span>
                <input type="text" name="title">
            </label>
        </div>
        <div class="form__git">
            <label>
                <span>Link to git:</span>
                <input type="text" name="git">
            </label>
        </div>
        <div class="form__project">
            <label>
                <span>Link to project:</span>
                <input type="text" name="project">
            </label>
        </div>
        <div class="form__project">
            <label>
                <span>Description:</span>
                <textarea type="text" name="description"></textarea>
            </label>
        </div>
        <button type="submit">Add work</button>
    </form>
</div>