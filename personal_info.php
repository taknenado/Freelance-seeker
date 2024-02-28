<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav_menu.css">
    <style>
        .left-space {
            margin-left: 20px;
        }
        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
        }
        .nav-menu a {
            margin-right: 10px;
        }
        .save-button{
        display: inline-block;
        background-color: #00FF00;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
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
            <li><a href="logout.php" class="logout_button button-container">Выйти</a></li>
            
        </ul>
    </nav>
</header>
<div class="left-space">
<?php

require_once("check_auth.php");
require_once("DB_config.php");
require_once("get_UserID.php");

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $query = "SELECT username, email, phone, gender, user_type FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Проверка наличия результатов запроса
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $user_type = $row['user_type'];

        echo "<h2>Личный кабинет</h2>";
        echo "<div class='left-space'></div>";
        echo "<img src='img/avatar.jpg' alt='Аватар' class='avatar'>";
        echo "<strong><a style='font-size: 35px; margin-left: 15px;'>$username</a></strong>";
        echo "<p><a href='#' onclick='toggleProfileFields()'>Редактировать профиль</a></p>";
        echo "<div id='profileFields' style='display: none;'>";
        echo "<p><strong>Почта:</strong> $email</p>";
        echo "<p><strong>Номер телефона:</strong> $phone</p>";
        echo "<p><strong>Пол:</strong> $gender</p>";
        echo "<p><strong>Тип пользователя:</strong> $user_type</p>";
        echo "<a href='#' onclick='toggleProfileFields('block') class='save-button button-container'>Сохранить</a>";
        echo "</div>";
        echo "<p><a href='portfolio.php'>Портфолио</a>, <a href='about_me.php'>Обо мне</a>, <a href='contact.php'>Контакты</a>, <a href='reviews.php'>Отзывы</a></p>";

    } else {
        echo "Данные пользователя не найдены.";
    }
} else {
    echo "Идентификатор пользователя не установлен.";
}

mysqli_close($connection);
?>
</div>
<script>
    function toggleProfileFields() {
        var profileFields = document.getElementById('profileFields');
        if (profileFields.style.display === 'none') {
            profileFields.style.display = 'block';
        } else {
            profileFields.style.display = 'none';
        }
    }
</script>
</body>
</html>