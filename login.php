<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);

    if (empty($login) || empty($pass)) {
        $error = "Пожалуйста, заполните все поля.";
    } else {
        // Подготовленный запрос для проверки пользователя
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Проверка пароля с хешем из базы данных
            if (password_verify($pass, $row['pass'])) {
                // Успешная авторизация, сохраняем информацию о пользователе в сессии
                $_SESSION['user'] = $row['login'];
                header("Location: html/index.html");
                exit();
            } else {
                $error = "Неверный пароль. Пожалуйста, попробуйте снова.";
            }
        } else {
            $error = "Пользователь с таким логином не найден.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>страна без границ - Авторизация</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="form-container">
    <div class="logo-background">
        <img src="html/images/main/logocwb.png" alt="Страна без границ" width="450">
    </div>
    <br>

    <!-- Форма авторизации -->
    <form action="login.php" method="post" class="form">
        <h2>Авторизация</h2>
        <?php if (!empty($error)): ?>
            <div class="error-message"> <?php echo $error; ?> </div>
        <?php endif; ?>
        <input type="text" placeholder="Логин" name="login" class="input" required>
        <input type="password" placeholder="Пароль" name="pass" class="input" required>
        <button type="submit" class="btn">Войти</button>
    </form>

    <!-- Кнопка для перехода на страницу регистрации -->
    <div>
        <p>Нет аккаунта?</p>
        <a href="register.php" class="btn">Зарегистрироваться</a>
    </div>
</div>
</body>
</html>
