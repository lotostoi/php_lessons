<?php
function connect_db()
{
    $link = mysqli_connect(HOST, USER, PASS, DB_NAME) or die("Connection's error" . mysqli_connect_error()());
    return $link;
}
