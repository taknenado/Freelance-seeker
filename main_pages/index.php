
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/test2.css">
    <!-- <script src="js/script.js"></script> -->

<style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #container {
            min-height: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            background: url(../img/a_fon.jpg) center top no-repeat; 
            background-size: cover  !important;
        }
        .container { max-width:1150px; position: relative; } 
        col-sm-4 .x7{width:33.33333333%;}
        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .col-1 {
            width: 100%;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
            color: #ffffff;
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
            color: #007bff;
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
            margin-top: 20px;
            display: flex;
            justify-content: center;
            max-width: 800px;
            background-color: rgb(255, 255, 255);
            margin: auto;
            padding: 12px;
        }

        textarea {
            width: 50%;
            min-height: 100px;
            padding: 10px;
            resize: vertical;
        }

        .text-right {
            text-align: left;
            margin-top: 10px;
        }

        .create-request-button {
            margin-top: 20px;
            text-align: center;
        }
        
</style>
    
</head>
<body>
<header>
    <nav class="nav-menu">
                <a href="index.php" class="logo">Your Logo</a>
            <ul class="nav-menu">
                <li><a href="orders.php">ЗАКАЗЫ</a></li>
                <li><a href="freelansers.php">ФРИЛАНСЕРЫ</a></li>
                <li><a href="contact.php">ПОРТФОЛИО</a></li>
                <li><a href="contact.php">УСЛУГИ</a></li>
                <li><a href="contact.php">ВАКАНСИИ</a></li>
                
            </ul>
            <ul>
                <?php
                session_start();

                if (isset($_SESSION['username'])) {
                ?>
                    <li class="right-align">
                        <a href="../users/personal_info.php" class="button userinfo_button">
                        <?php echo $_SESSION['username']; ?>
                        </a>
                    </li>
                <?php  
                } else {
                ?>
                    <li><a href="login.php" class="button login-button">Войти</a></li>
                    <li><a href="register.php" class="button register-button">Зарегестрироваться</a></li>
                <?php
                }
                ?>
            </ul>
    </nav>
</header>

<div id="container">
    <div class="col-1">
        <div class="cont-1">
            <h1>Нужен фрилансер?</h1>
        </div>
        <div class="x24">Надежный и недорогой?</div>
        <div class="x25">Фрилансеры-частники со всей страны готовя взяться за ваше задание</div>
        <form action="../orders/create_order.php" method="POST">
            <div class="centered-textarea text-right">
                <textarea name="task_description" placeholder="Введите текст заказа"></textarea>
                <p style="padding: 10px;">Создайте задание и уже сегодня получайте предложения от фрилансеров с ценой и сроками исполнения</p>
            </div>
            <div class="create-request-button">
                <button type="submit" class="button">Создать заказ</button>
            </div>
        </form>
    </div>
</div>
<!-- Спасибо Денис, за то что ты помог люто! -->
<div class="container"> 
        <div class="clear"><br><br></div>

    <div class="col-sm-4 x7">
        <div class="x8"><img src="../img/a_ic1.png"></div>
        <div class="x5">Не нужно переплачивать фирме</div>
        <div class="x6">Услуги фрилансеров стоят в разы дешевле, чем в студиях.</div>
    </div>
    <div class="col-sm-4 x7">
        <div class="x8"><img src="../img/a_ic2.png"></div>
        <div class="x5">Без посредников и прочих «безопасных» сделок</div>
        <div class="x6">Платите напрямую исполнителю, нет коммисий и дополнительных переплат.</div>
    </div>
    <div class="col-sm-4 x7">
        <div class="x8"><img src="../img/a_ic3.png"></div>
        <div class="x5">Удобная схема работы с фрилансерами</div>
        <div class="x6">Выбирайте фрилансера по  портфолио, рекомендациям  и отзывам.</div>
    </div>    
    <div class="clear"><br><br></div>
    <div class="x9"><h2>Фрилансеры по специальностям:</h2></div>
    <div class="clear"><br><br></div>    
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Создание сайтов</div>
        <div class="x11">
            <a href="/freelancers/web-programmisty/">Веб-программирование</a><br>
            <a href="/freelancers/dizaynery-saytov-web/">Дизайн сайтов</a><br>
            <a href="/freelancers/verstka-saitov-html-css/">Верстка</a><br></div>
    </div>
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Продвижение сайтов</div>
        <div class="x11">
            <a href="/freelancers/seo-yandex-google/">Продвижение сайтов</a><br>
            <a href="/freelancers/seo-copywriting/">SEO-копирайтинг</a><br>
            <a href="/freelancers/seo-audit/">SEO-аудит</a><br>        
        </div>
    </div>
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Тексты</div>
        <div class="x11">
            <a href="/freelancers/copywriter/">Копирайтинг</a><br>
            <a href="/freelancers/zhurnalisty/">Журналистика</a><br>
            <a href="/freelancers/slogany-neyming-zakazat/">Слоганы/Нейминг</a><br>             
        </div>
    </div>
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Соцсети</div>
        <div class="x11">
            <a href="/freelancers/reklama-v-sotssetyakh/">Реклама в соцсетях</a><br>
            <a href="/freelancers/smm_menedzher/">Создание и ведение групп</a><br>
            <a href="/freelancers/prodvizhenie-na-youtube/">Продвижение на Youtube</a><br>         
        </div>
    </div>            
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Графический дизайн</div>
        <div class="x11">
            <a href="/freelancers/sozdanie-logotipa/">Логотипы</a><br>
            <a href="/freelancers/designers-printers/">Полиграфия</a><br>
            <a href="/freelancers/illyustratory/">Иллюстрации</a><br>        
        </div>
    </div> 
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Маркетинг и реклама</div>
        <div class="x11">
            <a href="/freelancers/kontekstnaya-reklama-direct-adwords/">Контекстная реклама</a><br>
            <a href="/freelancers/marketing/">Маркетологи</a><br>
            <a href="/freelancers/reklamnye-kontseptsii/">Рекламные концепции</a><br>          
        </div>
    </div> 
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">3D графика</div>
        <div class="x11">
            <a href="/freelancers/3d-animatory/">3D Анимация</a><br>
            <a href="/freelancers/3d-hudozhniki-modeller/">3D Персонажи</a><br>
            <a href="/freelancers/modelirovanie/">Визуализация</a><br>           
        </div>
    </div> 
    <div class="col-xs-6 col-md-3 x7R">
        <div class="x10">Аудио / Видео</div>
        <div class="x11">
            <a href="/freelancers/videomontazh/">Видеомонтаж</a><br>
            <a href="/freelancers/saund-dizayn-zvuka/">Саунддизайн</a><br>
            <a href="/freelancers/zvukorezhissery-audio/">Звукорежиссеры</a><br>          
        </div>
    </div> 
</div>

</body>
</html>
