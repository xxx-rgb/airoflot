<?php session_start(); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация пользователя</title>
</head>

<body>
<?php if (!isset($_SESSION['email'])) { ?>
    <form method="post" action="login.php">
        <p>Введите email: <input type="text" name="email"></p>
        <p>Введите пароль: <input type="password" name="password"></p>
        <p><input type="submit" value="Войти"></p>
    </form>
<?php } else { ?>
    <h1>Добро пожаловать, <?= $_SESSION['email']; ?></h1>
    <a href="cabinet.php">Перейти в Личный кабинет</a>
<?php } ?>
</body>
</html>