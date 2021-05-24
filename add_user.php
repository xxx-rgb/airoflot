<?php
$user = [];
require 'database.php';
if (count($_POST) > 0) {
    addUser();
}

function addUser()
{
    global $db;
        $name = htmlspecialchars(addslashes($_POST['name']));
        $surname = htmlspecialchars(addslashes($_POST['surname']));
        $phone = htmlspecialchars(addslashes($_POST['phone']));
        $email = htmlspecialchars(addslashes($_POST['email']));
        $password = htmlspecialchars(addslashes($_POST['password']));


    if (!empty($name) && !empty($surname) && !empty($phone) && !empty($email)) {
        $password = md5(md5($password));

        mysqli_query($db, "INSERT INTO `users` (`name`, `surname`, `phone`, `email`, `password`) VALUES ('$name', '$surname', '$phone', '$email', '$password')");
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <title>airoflot</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h1> Пользователь успешно добавлен</h1>
<a href="cabinet.php">Перейти в Личный кабинет</a>
</body>
</html>