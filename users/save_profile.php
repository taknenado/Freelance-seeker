<?php

// Подключение к БД 
require_once("../check_auth.php");
require_once("../DB_config.php");
require_once("../get_UserID.php");

// Проверка переданных данных
if(isset($_POST['phone'])) {

  // Получаем ID пользователя из сессии
  $user_id = $_SESSION['user_id'];

  // Получаем данные из формы
  $phone = $_POST['phone'];

  // Экранируем для безопасности  $phone = mysqli_real_escape_string($phone);


  // Запрос на обновление данных
  $sql = "UPDATE users SET phone='$phone' WHERE user_id='$user_id'";

  // Выполняем запрос
  if(mysqli_query($connection, $sql)) {
    $_SESSION['message'] = "Данные сохранены!"; 
  } else {
    $_SESSION['message'] = "Ошибка сохранения!";
  }

}

// Перенаправляем обратно после сохранения
header("Location: personal_info.php");  

?>
