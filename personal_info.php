<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

        // Вывод данных пользователя в центре страницы
        echo "<h2>Личный кабинет</h2>";
        echo "<p><strong>ID пользователя:</strong> $user_id</p>";
        echo "<p><strong>Никнейм:</strong> $username</p>";
        echo "<p><strong>Почта:</strong> $email</p>";
        echo "<p><strong>Номер телефона:</strong> $phone</p>";
        echo "<p><strong>Пол:</strong> $gender</p>";
        echo "<p><strong>Тип пользователя:</strong> $user_type</p>";

        // Вывод кнопки "Выйти"
        echo '<a href="logout.php" class="logout_button button-container">Выйти</a>';
    } else {
        // Обработка случая, когда данные пользователя не найдены
        echo "Данные пользователя не найдены.";
    }
} else {
    // Обработка случая, когда user_id пользователя не был установлен
    echo "Идентификатор пользователя не установлен.";
}

// Закрываем соединение с базой данных
mysqli_close($connection);
?>
</body>
</html>