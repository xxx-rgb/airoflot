<?php
require 'database.php';

if (count($_POST) > 0) {
    addUser();
}

function addUser()
{

}

function getUsers(): array
{
    global $db;
    $users = [];

    $result = mysqli_query($db, "SELECT * FROM users");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $users[] = mysqli_fetch_assoc($result);
    }

    return $users;
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
    <h1>Вход в личный кабинет</h1>
</head>
<body>
    <table border="1">
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Телефон</td>
            <td>Email</td>
            <td>Редактировать</td>
        </tr>
        <?php if (count(getUsers()) === 0) { ?>
            <tr>
                <td colspan="5">Пользователи не найдены</td>
            </tr>
        <?php } else { foreach ($users = getUsers() as $user) { ?>
            <tr>
                <td><?= $user['name']; ?></td>
                <td><?= $user['surname']; ?></td>
                <td><?= $user['phone']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id']; ?>">Редактировать</a> /
                    <a href="delete_user.php?id=<?= $user['id']; ?>">Удалить</a>
                </td>
            </tr>
        <?php } } ?>
    </table>

    <form method="post" action="add_user.php" style="">
        <fieldset>
            <p><input type="text" name="name" placeholder="Введите имя"></p>
            <p><input type="text" name="surname" placeholder="Введите фамилию"></p>
            <p><input type="text" name="phone" placeholder="Введите телефон"></p>
            <p><input type="email" name="email" placeholder="Введите email"></p>
            <p><input type="password" name="password" placeholder="Введите пароль"></p>
            <p><input type="submit" value="Добавить"></p>
        </fieldset>
    </form>
</body>
</html>

