<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav_menu.css">
    <!-- <script src="js/script.js"></script> -->

    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            min-height: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            background: url(img/a_fon.jpg) center top no-repeat; 
            background-size: cover  !important;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .col-1 {
            width: 100%;
            text-align: center; /* Центрирование содержимого в колонке */
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

        .cont-1 {
            font-size:40px;
            font-family: 'OpenSansBold', Arial;
            color:#191919;
            text-align: center;
            line-height: 40px;
            padding-bottom: 16px;
            padding-top: 40px;
            text-align: center;
        }
        .cont-1 p {
            text-align: center;
        }
        .cont-1 h1 { 
            font-size:40px;
            font-family: 'OpenSansBold', Arial;
            color:#191919;
            text-align: center;
            line-height: 40px;
            margin-bottom: 0px;
        }
        .x24 {
            font-size: 30px;
            font-family: OpenSansBold, Arial;
            color: rgb(21, 160, 165);
            text-align: center;
            line-height: 30px;
            padding-bottom: 16px;
        }
        .x25 {
            font-size: 21px;
            font-family: OpenSansRegular, Arial;
            color: rgb(59, 59, 59);
            text-align: center;
            line-height: 30px;
            padding-bottom: 16px;
        }

        .centered-textarea {
            text-align: center;
            margin-top: 20px; /* Добавляем немного отступа сверху */
            display: flex;
            justify-content: center; /* Выравнивание по горизонтали */
            max-width: 800px;
            background-color: rgb(255, 255, 255);
            margin: auto;
            padding: 12px;
        }

        textarea {
            width: 50%; /* Ширина textarea */
            min-height: 100px; /* Минимальная высота textarea */
            padding: 10px; /* Поля вокруг текста */
            resize: vertical; /* Разрешаем вертикальное изменение размера */
        }

        .text-right {
            text-align: left; /* Выравнивание текста по левому краю */
            margin-top: 10px; /* Немного отступаем сверху */
        }

        .create-request-button {
            margin-top: 20px; /* Отступ от текста */
            text-align: center; /* Центрируем текст */
        }
    </style>
    
</head>
<body>
<header>
    <nav class="nav-menu">
        <a href="index.php" class="logo">Your Logo</a>
        <ul class="nav-menu">
            <li><a href="about.php">ЗАКАЗЫ</a></li>
            <li><a href="services.php">ФРИЛАНСЕРЫ</a></li>
            <li><a href="contact.php">ПОРТФОЛИО</a></li>
            <li><a href="contact.php">УСЛУГИ</a></li>
            <li><a href="contact.php">ВАКАНСИИ</a></li>
        </ul> 
        <ul>   
            <li><a href="login.php" class="button login-button">Войти</a></li>
            <li><a href="registration/register.php" class="button register-button">Зарегестрироваться</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="container">
        <div class="col-1">
            <div class="cont-1">
                <h1>Нужен фрилансер?</h1>
            </div>
            <div class="x24">Надежный и недорогой?</div>
            <div class="x25">Фрилансеры-частники со всей страны готовя взяться за ваше задание</div>
            <div class="centered-textarea text-right">
                <textarea name="mess" placeholder="Введите текст заявки"></textarea>
                <p style="padding: 10px;">Создайте задание и уже сегодня получайте предложения от фрилансеров с ценой и сроками исполнения</p>
            </div>
            <div class="create-request-button">
                <a href="#" class="button">Создать заявку</a>
            </div>
        </div>
    </div>
</main>


<footer>
    <!-- Здесь может быть подвал сайта или дополнительная информация -->
</footer>

</body>
</html>
