<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/personal_info.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
</head>
 <?php
 session_start();
 ?>
<body>
    <header>
        <nav class="nav-menu">
            <a href="../index.php" class="logo">Your Logo</a>
            <ul class="nav-menu">
                <li><a href="about.php">ЗАКАЗЫ</a></li>
                <li><a href="../freelansers.php">ФРИЛАНСЕРЫ</a></li>
                <li><a href="contact.php">ПОРТФОЛИО</a></li>
                <li><a href="contact.php">УСЛУГИ</a></li>
                <li><a href="contact.php">ВАКАНСИИ</a></li>
            </ul>
            <ul>
                <li><a href="../logout.php" class="logout_button button-container">Выйти</a></li>

            </ul>
        </nav>
    </header>
    <div class="left-space">
        <?php



if (!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../login.php");
    exit();
}

require_once("../DB_config.php");
require_once("../get_UserID.php");
require_once("../site_settings.php");

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $query = "SELECT username, email, phone, gender, user_type, profession, specialization FROM users WHERE user_id = ?";
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
        $profession = $row['profession'];
        $specialization = $row['specialization'];

        echo "<h2>Личный кабинет</h2>";
        echo "<div class='left-space'></div>";
        echo "<div class='user'>";

        $sql = "SELECT avatar_path FROM users WHERE user_id = $user_id";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $avatarPath = $row['avatar_path'];

        echo "<div class='avatar-container'>";
            echo "<div class='avatar-content'>";
                echo "<div class='avatar-content'>";
                if ($avatarPath) {
                    echo "<img src='$baseUrl$avatarPath' class='avatar'>";}
                echo "</div>";
                    echo "<div class='nickname'>";
                        echo "<p class='username'>$username</p>";
                    echo "</div>";
                echo "</div>";
                echo '
                <button id="changeAvatarBtn">Изменить фото профиля</button>
                
                <div id="avatarModal" class="modal">
                            <div class="modal-content">
                            <h2>Выберите файл для обновления аватара</h2>
                            <button id="close-btn" class="close-modal">&times;</button> <!-- Кнопка закрытия -->
                                <form action="update_avatar.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="avatar" id="avatarInput">
                                    <br>
                                    <button id="changeAvatarBtn" type="submit">Обновить аватар</button>
                                </form>
                        <div class="avatar-preview" id="avatarPreview"></div>
                    </div>
                </div>';
            echo "</div>";
        echo "</div>";
        echo "<br>";
        echo "<p><a href='#' onclick='toggleProfileFields()' class='edit-profile-link'>Редактировать профиль</a></p>";
        echo "<form action='save_profile.php' method='post'>";
            echo "<div id='profileFields' style='display: none;'>";
                echo "<p><strong>Почта:</strong> $email</p>";
                echo "<input type='text' id='phone' name='phone' placeholder='+7 (___) ___-__-__' value='$phone'>";
                echo "<p><strong>Пол:</strong> $gender</p>";
                echo "<p><strong>Тип пользователя:</strong> $user_type</p>";
            echo "<div style='display: flex;'>";
                echo "<div style='margin-right: 20px;'>";
                echo "<p><strong>Профессия:</strong></p>";
            echo "<select name='profession' id='profession'>";
                echo "<option value='0'>Выберите профессию</option>";
                echo "<option value='1'>Разработка сайтов</option>";
                echo "<option value='2'>Дизайн</option>";
                echo "<option value='3'>Арт</option>";
                echo "<option value='4'>Программирование</option>";
                echo "<option value='5'>Тексты</option>";
                echo "<option value='6'>Реклама/Маркетинг</option>";
                echo "<option value='7'>3D Графика/Анимация</option>";
                echo "<option value='8'>Архитектура / Интерьеры / Инжиниринг</option>";
                echo "<option value='9'>Оптимизация (SEO)</option>";
                echo "<option value='10'>Менеджмент</option>";
                echo "<option value='11'>Флеш</option>";
                echo "<option value='12'>Переводы</option>";
                echo "<option value='13'>Фотография</option>";
                echo "<option value='14'>Аудио/Видео</option>";
                echo "<option value='15'>Консалтинг</option>";
                echo "<option value='16'>Другое</option>";
                echo "<option value='17'>Соцсети</option>";
                echo "<option value='18'>Бухгалтерия</option>";
            echo "</select>";
                echo "</div>";
                echo "<div>";
                echo "<p><strong>Специализация:</strong></p>";
                echo "<select name='specialization' id='specialization' disabled>";
                echo "<option value='0'>Выберите свою специализацию</option>";
                echo "</select>";
                echo "</div>";
            echo "</div>";
            echo "<br><br>";
            echo "<button type='submit' class='save-button button-container'>Сохранить</button>";
            echo "</div>";
        echo "</form>";
        echo "<div id='TwoMenu'>";
        echo "<p><span class='selected_menu'>Портфолио</span>";
        echo "<a href='about_me.php'>Обо мне</a>";
        echo "<a href='contact.php'>Контакты</a>";
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
    <script src="../scripts/personal_info.js"></script>
</body>

</html>