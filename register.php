<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);
    $repeatpass = trim($_POST['repeatpass']);


    // Проверка на пустые поля
    if (empty($login) || empty($pass) || empty($repeatpass)) {
        $error = "Пожалуйста, заполните все поля.";
    } elseif ($pass !== $repeatpass) {
        // Проверка на совпадение паролей
        $error = "Пароли не совпадают.";
    } else {
        // Проверка, существует ли уже логин в базе данных
        $stmt = $conn->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Логин уже занят. Пожалуйста, выберите другой.";
        } else {
            // Хешируем пароль перед сохранением
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            // Вставка нового пользователя
            $stmt = $conn->prepare("INSERT INTO users (login, pass, email) VALUES (?, ?, '')");
            $stmt->bind_param("ss", $login, $hashed_pass); // Подготовленный запрос теперь включает поле email как пустое значение

            if ($stmt->execute()) {
                header("Location: index.php?message=registration_success");
                exit();
            } else {
                $error = "Ошибка при регистрации. Пожалуйста, попробуйте снова.";
            }
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
    <title>страна без границ - Регистрация</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="form-container">
    <div class="logo-background">
        <img src="html/images/main/logocwb.png" alt="Страна без границ" width="450">
    </div>
    <br>

    <!-- Форма регистрации -->
    <form action="register.php" method="post" class="form">
        <h2>Регистрация</h2>
        <?php if (!empty($error)): ?>
            <div class="error-message"> <?php echo $error; ?> </div>
        <?php endif; ?>
        <input type="text" placeholder="Логин" name="login" class="input" required>
        <input type="password" placeholder="Пароль" name="pass" class="input" required>
        <input type="password" placeholder="Повторите пароль" name="repeatpass" class="input" required>

        <button type="submit" class="btn">Зарегистрироваться</button>
    </form>
</div>
</body>
</html>
