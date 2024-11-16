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

    <!-- форма авторизации -->
    <form action="login.php" method="post" class="form">
        <h2>Авторизация</h2>
        <input type="text" placeholder="Логин" name="login" class="input" required>
        <input type="password" placeholder="Пароль" name="pass" class="input" required>
        <button type="submit" class="btn">Войти</button>
    </form>

    <!-- кнопка для перехода на страницу регистрации -->
    <div>
        <p>первый раз у нас?</p>
        <a href="register.php" class="btn">Зарегистрироваться</a>
    </div>
</div>
</body>
</html>
