<?php
function getImegeById($id)
{
    return  get_db_result('SELECT * FROM ' . PICTURES . " WHERE id={$id}")[0];
}
function inc_namber_of_views_by_id($id)
{
    return update_db("UPDATE " . PICTURES . " SET namber_of_views = namber_of_views + 1 WHERE id={$id}");
}
