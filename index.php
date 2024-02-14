<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Стили для вашей страницы */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .user-type {
            margin-bottom: 20px;
        }

        .user-type label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .user-type input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <header>
        <!-- Здесь может быть ваш заголовок или навигационное меню -->
    </header>

    <main>
        <div class="container">
            <h1>Фрилансеры и Заказчики</h2>
            <p>Мы предоставляем платформу для встречи фрилансеров и заказчиков.</p>
            <a href="registration/register.php" class="button">Зарегестрироваться</a>
            <a href="login.php" class="button">Войти</a>
        </div>
    </main>

    <footer>
        <!-- Здесь может быть подвал сайта или дополнительная информация -->
    </footer>
</body>
</html>