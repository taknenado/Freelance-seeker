<?php
require_once('check_auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Страница пользователя</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav_menu.css">
    
    <style>
    .button-container {
        display: flex;
        justify-content: flex-start;
  }
  
  .logout_button {
        display: inline-block;
        background-color: #eb1639;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        margin-top: 20px;
  }
    </style>
</head>
<body>
    <header>
        <nav class="nav-menu">
            <a href="index.php" class="logo">Your Logo</a>
            <ul class="nav-menu">
                <li><a href="about.php">О нас</a></li>
                <li><a href="services.php">Услуги</a></li>
                <li><a href="contact.php">Контакты</a></li>
            </ul> 
            <ul>   
            <li class="right-align"><a href="personal_info.php" class="button userinfo_button"><?php echo $_SESSION['username']; ?></a></li>
            </ul>
        </nav>
    </header>

    <h1>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Это специальная страница для авторизованных пользователей.</p>
    <p>Здесь вы можете отображать контент, доступный только авторизованным пользователям.</p>
    <!-- Дополнительный контент для зарегистрированных пользователей -->
</body>
</html>