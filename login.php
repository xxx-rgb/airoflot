<?php
session_start(); // открываем сессию

require 'database.php';
// получаем данные из формы
$email = htmlspecialchars(addslashes($_POST['email']));
$password = htmlspecialchars(addslashes($_POST['password']));

if (!empty($email) && !empty($password)) { // проверяем, что логин и пароль заполнены
    // выполняем запрос на поиск пользователя в БД
    $result = mysqli_query($db, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($result) !== 0) { // если пользователь найден, то создаем сессию
        $user = mysqli_fetch_assoc($result); // получаем данные о пользователе из результата запроса

        $_SESSION['email'] = $email;
        $_SESSION['id'] = $user['id'];

        header('Location: sessia.php');
        // перенаправляем пользователя обратно на главную страницу
    } else {
        die('Неправильный логин или пароль');
    }
}