<?php
$avatar = $_FILES['avatar'];
if (is_uploaded_file('avatar')) {
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
<body>
<h1>Аватар успешно обнавлён</h1>
<hr>
<a href="cabinet.php">Вернуться в личный кабинет</a>
</body>
</html>
