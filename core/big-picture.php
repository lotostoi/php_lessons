<?php
function getImegeById($id)
{
    return  get_db_result('SELECT * FROM ' . PICTURES . " WHERE id={$id}")[0];
}
function inc_number_of_views_by_id($id)
{
    return update_db("UPDATE " . PICTURES . " SET number_of_views = number_of_views + 1 WHERE id={$id}");
}
