<?php

function validateForm($name, $email, $phone) {
    if (empty($name) || strlen($name) < 2) {
        return "Ошибка: Имя не может быть пустым и должно содержать не менее 2 символов.";
    }

    if (empty($email) || strlen($email) < 5 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Ошибка: Email не может быть пустым, должен содержать не менее 5 символов и быть в правильном формате.";
    }

    if (empty($phone) || strlen($phone) != 11) {
        return "Ошибка: Номер телефона не может быть пустым и должен содержать ровно 11 символов.";
    }

    return "Форма успешно отправлена!";
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = validateForm($name, $email, $phone);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Валидация формы на PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Форма валидации</h2>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Имя" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="phone" placeholder="Телефон (11 символов)" required><br><br>
        <button type="submit" class="button">Отправить</button>
    </form>
    <div class="message"><?php echo $message; ?></div>
</div>

</body>
</html>
