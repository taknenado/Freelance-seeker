<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/reg_log_style.css">
    
</head>
<body>
    <header>
        <!-- Здесь может быть ваш заголовок или навигационное меню -->
    </header>

    <main class="main">
    <div class="center">
                <a href="../index.php" class="button button-container">На главную</a>
            </div>
        <h1>Регистрация</h1>
        
        <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error === "email_exists") {
                echo '<p class="error-message">Адрес электронной почты уже зарегистрирован.</p>';
            } elseif ($error === "username_exists") {
                echo '<p class="error-message">Никнейм уже зарегистрирован.</p>';
            }
        }
        ?>
        
        <form action="registration_process.php" method="POST" class="center">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Повторите пароль:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <label for="phone">Номер телефона:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <label for="gender">Пол:</label>
            <label><input type="radio" id="male" name="gender" value="male" required>Мужской</label>
            <label><input type="radio" id="female" name="gender" value="female">Женский</label>
            
            <label for="birthdate">Дата рождения:</label>
            <input type="date" id="birthdate" name="birthdate" required>
            
            <label for="user_type">Тип пользователя:</label>
            <label><input type="radio" id="freelancer" name="user_type" value="freelanser" required>Фрилансер</label>
            <label><input type="radio" id="employer" name="user_type" value="employer">Работодатель</label>
            
            <input type="submit" value="Зарегистрироваться">
        </form>
        <div class="center">
            <p>Уже есть аккаунт? <a href="../login.php">Войти</a></p> 
        </div>
    </main>

    <footer>
        <!-- Здесь может быть подвал сайта или дополнительная информация -->
    </footer>
</body>
</html>
