<?php
require_once('check_auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Страница пользователя</title>
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
  .userinfo_button {
        display: inline-block;
        background-color: #1E90FF;
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
    <h1>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Это специальная страница для авторизованных пользователей.</p>
    <p>Здесь вы можете отображать контент, доступный только авторизованным пользователям.</p>
    <a href="personal_info.php" class="userinfo_button">Личный кабинет</a>
    <!-- Дополнительный контент для зарегистрированных пользователей -->
</body>
</html>