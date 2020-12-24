<?php
function getCatalog()
{
    $catalog = get_db_result("SELECT * FROM " . WORKS . " ORDER BY id DESC");
    foreach ($catalog as $key => $work) {
        $id = $work['id'];
        $id_tags =  get_db_result("SELECT id_tag FROM " . WORKS_TO_TAGS . " WHERE id_work = $id");
        $tags = [];
        foreach ($id_tags as $tag) {
            $id_t = $tag['id_tag'];
            $tag_value = get_db_result("SELECT name FROM " . TAGS . " WHERE id = $id_t")[0]['name'];
            $tags[] = $tag_value . ',';
        }
        $inx = count($tags)-1;
        $tags[$inx] = str_replace(',', '.', $tags[$inx]);
        $catalog[$key]['tags'] = $tags;
    }
    return $catalog;
}
