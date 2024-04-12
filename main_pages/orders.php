<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/test2.css">
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

<button onclick="location.href='../orders/create_order.php'">Создать проект</button>
</body>
</html>