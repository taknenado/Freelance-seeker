<?php
session_start(); // Начинаем сессию

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    // Пользователь не авторизован, перенаправляем на страницу авторизации
    header("Location: login.php");
    exit();
}
require_once("DB_config.php");
// Создание соединения с базой данных
$connection = mysqli_connect($hostname, $username, $password, $database);

// Проверка соединения
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Получаем username из сессии
$username = $_SESSION['username'];

// Запрос к базе данных для получения user_id
$query = "SELECT user_id FROM users WHERE username = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
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
    echo "Данные пользователя не найдены.";
}

// Закрываем соединение с базой данных
mysqli_close($connection);
?>