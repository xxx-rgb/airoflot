<?php
require 'database.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$db = mysqli_connect('localhost', 'airoflot', 'airoflot123', 'airoflot');

if (!empty($id)) {
    mysqli_query($db, "DELETE FROM users WHERE id = " . $id);

    header('Location: index.php');
} else {
    die('id пользователя не получен');
}