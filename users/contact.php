<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
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
        .user {
        display: flex;
        align-items: center; 
        }
        .username {
        margin: auto 10px;
        font-size: 25px
        }
        #TwoMenu A {
        text-decoration: underline;
        margin-right: 10px;
        font-size: 15px;
        font-weight: bold;
        font-family: 'OpenSansBold', Arial;
        color: #15A0A5;
        }
        .selected_menu {
        font-size: 15px;
        font-weight: bold;
        font-family: 'OpenSansBold', Arial;
        color: #343434;
        margin-right: 10px;
        }

    </style>
</head>
<body>
<header>
<nav class="nav-menu">
        <a href="../index.php" class="logo">Your Logo</a>
        <ul class="nav-menu">
            <li><a href="about.php">ЗАКАЗЫ</a></li>
            <li><a href="freelansers.php">ФРИЛАНСЕРЫ</a></li>
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

session_start();

if(!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../login.php");
    exit(); 

}
require_once("../DB_config.php");
require_once("../get_UserID.php");

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
        echo "<div class='user'>";
            echo "<img src='../img/avatar.jpg' alt='Аватар' class='avatar'>";
            echo "<strong><a class='username'>$username</a></strong>";
        echo "</div>";
        echo "<p><a href='#' onclick='toggleProfileFields()'>Редактировать профиль</a></p>";
            echo "<form action='save_profile.php' method='post'>";
                echo "<div id='profileFields' style='display: none;'>";
                    echo "<p><strong>Почта:</strong> $email</p>";
                    echo "<input type='text' id='phone' name='phone' placeholder='+7 (___) ___-__-__' value='$phone'>"; 
                    echo "<p><strong>Пол:</strong> $gender</p>";
                    echo "<p><strong>Тип пользователя:</strong> $user_type</p>";
                    echo "<button type='submit' class='save-button button-container'>Сохранить</button>";
                echo "</div>"; 
            echo "</form>";
        echo "<div id='TwoMenu'";
            echo "<p><a href='personal_info.php'>Портфолио</a>"; 
            echo "<a href='about_me.php'>Обо мне</a>"; 
            echo "<span class='selected_menu'>Контакты</span>"; 
            echo "<a href='reviews.php'>Отзывы</a></p>";
        echo "</div>";
    } else {
        echo "Данные пользователя не найдены.";
    }
} else {
    echo "Идентификатор пользователя не установлен.";
}

mysqli_close($connection);
?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $("#phone").mask("+7 (999) 999-99-99");

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