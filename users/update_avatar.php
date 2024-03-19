<?php

require_once '../check_auth.php'; 
require_once '../DB_config.php';

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Получаем данные о файле
  $avatar = $_FILES['avatar'];
  
  // Валидация файла
  $allowedTypes = ['image/jpeg', 'image/png'];
  $maxSize = 2 * 1024 * 1024; // 2 MB
  if (!in_array($avatar['type'], $allowedTypes)) {
    $error = 'Недопустимый тип файла';
  } elseif ($avatar['size'] > $maxSize) {
    $error = 'Слишком большой размер файла';
  }
  
  // Если ошибок нет - сохраняем файл
  if (!isset($error)) {
    
    // Папка для сохранения
    $uploadFolder = '../uploads/avatars/';
    
    // Генерируем уникальное имя
    $fileExtension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
    $newFileName = uniqid() . "." . $fileExtension;

    // Загружаем файл на сервер 
    move_uploaded_file($avatar['tmp_name'], $uploadFolder . $newFileName);
    
    // Успешный ответ
    $response = [
      'uploaded' => true,
      'fileName' => $newFileName
    ];
    
  } else {
    $response = [
      'uploaded' => false,
      'error' => $error
    ];
  }
  $user_id = $_SESSION['user_id'];

// Обновляем путь к аватару в БД
$sql = "UPDATE users 
        SET avatar_path = '../uploads/avatars/$newFileName' 
        WHERE user_id = $user_id";

mysqli_query($connection, $sql);

// Делаем редирект обратно
header('Location: personal_info.php?avatar_updated');

  echo json_encode($response);
  
}
