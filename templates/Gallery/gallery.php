<?php
define('BIG', "./src/bigimages/");
define ('SMALL' ,"./src/smallimages/");

$images = array_slice(scandir(BIG), 2);
sort($images, SORT_NUMERIC | SORT_FLAG_CASE);

function getGallery($images)
{
    $gallery =  '';
    foreach ($images as  $img) {
        if (!file_exists(SMALL . $img)) {
            $image = new SimpleImage();
            $image->load(BIG . $img);
            $image->resizeToWidth(250);
            $image->save(SMALL . $img);
        }
        $params = [
            'linkToBigImg' => BIG . $img,
            'linkToSmallImg' => SMALL . $img,
        ];
        $gallery .= renderTemlate("Gallery/image", $params);
    }
    return $gallery;
}
$form = renderTemlate("Gallery/loader");
$gallery = getGallery($images);

?>
<?= $form ?>
<div class="gallery">
    <?= $gallery ?>
</div>