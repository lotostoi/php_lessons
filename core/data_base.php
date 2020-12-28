<?php
function connect_db()
{
    static $link = null;
    if (is_null($link)) {
        $link = @mysqli_connect(HOST, USER, PASS, DB_NAME) or die("Connection's error" . mysqli_connect_error());
    }
    return $link;
}

function get_assoc_result($request)
{
    $result = @mysqli_query(connect_db(), $request) or die(mysqli_error(connect_db()));
    $array_result = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    return $array_result;
}

function execute($request)
{
    @mysqli_query(connect_db(), $request) or die(mysqli_error(connect_db()));
    return mysqli_affected_rows(connect_db());
}


function protect($val)
{
    return strip_tags(htmlspecialchars(mysqli_real_escape_string(connect_db(), $val)));
}
