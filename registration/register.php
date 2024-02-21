<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/reg_log_style.css">
    <style>
        .button-container {
            margin-top: 20px;
        }
        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-container button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            margin-top: 5px;
            display: none; /* Скрыть сообщение об ошибке по умолчанию */
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#phone").mask("+7 (999) 999-99-99");

            $("#confirm_password").on("input", function() {
                var password = $("#password").val();
                var confirm_password = $(this).val();

                if (confirm_password.length > 0) { // Проверка, что поле не пустое
                    if (password === confirm_password) {
                        $("#password_error").hide(); // Скрыть сообщение об ошибке
                    } else {
                        $("#password_error").show(); // Показать сообщение об ошибке
                    }
                } else {
                    $("#password_error").hide(); // Скрыть сообщение об ошибке
                }
            });
        });
    </script>
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
            <input type="text" id="username" name="username" required placeholder="Логин">

            <input type="email" id="email" name="email" required placeholder="Почта">

            <input type="password" id="password" name="password" required placeholder="Пароль">

            <input type="password" id="confirm_password" name="confirm_password" required placeholder="Повторите пароль">
            <p id="password_error" class="error-message">Пароли не совпадают</p>

            <input type="text" id="phone" name="phone" required placeholder="+7 (___) ___-__-__">

            <label for="birthdate">Дата рождения:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="gender">Пол:</label>
            <select id="gender" name="gender" required>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
            </select>


            <label for="user_type">Тип пользователя:</label>
            <select id="user_type" name="user_type" required>
                <option value="freelancer">Фрилансер</option>
                <option value="employer">Работодатель</option>
            </select>

            <div class="button-container">
                <button type="submit">Зарегистрироваться</button>
            </div>
        </form>
       <div class="center">
            <p>Уже есть аккаунт? <a href="../login.php">Войти</a></p>
        </div>
    </main>
</body>
</html>