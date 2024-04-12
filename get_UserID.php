<?php
require_once("config/DB_config.php"); 
// Запрос к базе данных для получения user_id
$query = "SELECT user_id FROM users WHERE username = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Проверка наличия результатов запроса
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    // Устанавливаем user_id в сессию
    $_SESSION['user_id'] = $user_id;
} else {
    // Обработка случая, когда данные пользователя не найдены
    error_log("Данные пользователя не найдены.");
}

// Закрываем подготовленный запрос
mysqli_stmt_close($stmt);
?>