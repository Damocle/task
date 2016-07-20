<?php
header("Content-type: text/html; charset=utf-8");
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'attr';
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli -> connect_errno) {
    die($mysqli -> connect_error);
}
$sql = "set names utf8";
if(!$mysqli -> query($sql)) {
    echo mysql_error();
}
?>