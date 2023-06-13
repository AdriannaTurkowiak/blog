<?php

$db_host = "localhost";
$db_name = "kurs_udemy_cms";
$db_user = "kurs_udemy_cms_www";
$db_pass = "#DjNzD#2023";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

 