<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + HTML</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="form-container">
    <form action="register.php" method="post" class="form">
        <h2>Регистрация</h2>
        <input type="text" placeholder="Логин" name="login" class="input">
        <input type="password" placeholder="Пароль" name="pass" class="input">
        <input type="password" placeholder="Повторите пароль" name="repeatpass" class="input">
        <input type="email" placeholder="Электронная почта" name="email" class="input">
        <button type="submit" class="btn">Зарегистрироваться</button>
    </form>

    <form action="login.php" method="post" class="form">
        <h2>Вход</h2>
        <input type="text" placeholder="Логин" name="login" class="input">
        <input type="password" placeholder="Пароль" name="pass" class="input">
        <button type="submit" class="btn">Войти</button>
    </form>
</div>

</body>
</html>
