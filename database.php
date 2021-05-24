<?php
$db = mysqli_connect('localhost', 'airoflot', 'airoflot123', 'airoflot');
if (mysqli_connect_errno()) {
    die('ошибка подключения к базе данных');
} else {
    mysqli_query($db, "SET NAMES 'utf8'");
}
