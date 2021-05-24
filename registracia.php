<!doctype html>
<html lang="en">
<head>
    <title>airoflot</title>
</head>
<body>
<form method="post" action="add_user.php">
    <input type="text" name="name" placeholder="Введите Ваше имя">
    <input type="text" name="surname" placeholder="Введите Вашу фамилию">
    <input type="text" name="phone" placeholder="Введите Ваш телефон">
    <input type="text" name="email" placeholder="Введите email">
    <input type="text" name="password" placeholder="Введите пароль">
    <input type="submit" value="Отправить">
</form>
</body>
</html>


<?php
$name = htmlspecialchars(addslashes($_POST['name']));
$surname = htmlspecialchars(addslashes($_POST['surname']));
$email = htmlspecialchars(addslashes($_POST['email']));
$password = htmlspecialchars(addslashes($_POST['password']));
$string = $name . ' ' . $surname . ' ' . $email . ' ' . $password;
file_put_contents('bitcoin.txt', $string, FILE_APPEND);
?>
