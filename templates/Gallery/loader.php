<div class="loader">
    <form method="post" enctype="multipart/form-data" multiple class="loader__form">
        <input type="file" name="file[]" id="files" multiple>
        <button type="submit">Add images</button>
    </form>
</div>

<?php
if ($result_load) : ?>
    <div class="result_loader">
        <?= $result_load ?>
    </div>
<?php
endif;
?>