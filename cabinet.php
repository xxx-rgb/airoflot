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

    $result = mysqli_query($db, "SELECT * FROM `users`");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $users[] = mysqli_fetch_assoc($result);
    }

    return $users;
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>airoflot</title>
</head>
<h1 align="middle">Личный кабинет</h1>
<form method="post" action="cabinet.php" enctype="multipart/form-data">
    <p><input type="file" name="avatar"></p>
    <p><input type="submit" value="Загрузить аватар"></p>
</form>
</body>
</html>
<?php

$avatar = $_FILES['avatar'];
if (is_uploaded_file($avatar)) {
    move_uploaded_file($avatar['tmp_name'], 'images/files/' . $avatar['name']);
}
$avatar = $_FILES['avatar'];

if ($avatar['size'] > 20 * 1024 * 1024) {
    die('Размер превышает 20МБ');
}
function checkExtension(string $avatar): bool
{
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif']; //массив с разрешенными расширениями
    $file_ext = pathinfo($avatar)['extension'];

    return !(array_search($allowed_extensions, $file_ext) === false); // возвращаем true, если расширение файла было найдено в массиве разрешенных расширений
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>airoflot</title>
</head>
<img src="C:\xampp\htdocs\моё\экз\images\files\<?php $avatar?>">
<table border="1">
    <tr>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Email</td>
    </tr>
        <tr>
            <td><?= $_SESSION['name']; ?></td>
            <td><?= $_SESSION['surname']; ?></td>
            <td><?= $_SESSION['email']; ?></td>
            <td>
                <a href="edit_user.php?id=<?= $user['id']; ?>">Редактировать данные</a>
            </td>
        </tr>
</table>
<a href="logout.php">Выйти</a>
</body>
</html>