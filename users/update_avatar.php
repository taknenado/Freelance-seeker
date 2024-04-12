<?php

require_once '../includes/check_auth.php'; 
require_once '../includes/DB_config.php';
require_once '../includes/get_UserID.php';
require_once '../includes/site_settings.php';
const DEFAULT_AVATAR = 'http://localhost/Freelance-seeker/uploads/avatars/default-avatar.png';
$user = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM users WHERE user_id = $user_id"));
$previousAvatar = $user['avatar_path'];
// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $avatar = $_FILES['avatar'];
  
  $allowedTypes = ['image/jpeg', 'image/png'];
  $maxSize = 2 * 1024 * 1024; // 2 MB
  if (!in_array($avatar['type'], $allowedTypes)) {
    $error = 'Недопустимый тип файла';
  } elseif ($avatar['size'] > $maxSize) {
    $error = 'Слишком большой размер файла';
  }
  
  // Если ошибок нет - сохраняем файл
  if (!isset($error)) {
    
    $uploadFolder = '../uploads/avatars/';
    
    $fileExtension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
    $newFileName = uniqid() . "." . $fileExtension;

    move_uploaded_file($avatar['tmp_name'], $uploadFolder . $newFileName);
    
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

$sql = "UPDATE users 
        SET avatar_path = '/uploads/avatars/$newFileName' 
        WHERE user_id = $user_id";

mysqli_query($connection, $sql);
if($previousAvatar && $previousAvatar !== DEFAULT_AVATAR) {
  if($previousAvatar) {
    
    if(!unlink(__DIR__ . '/../' . $previousAvatar)) {
    }
    
  }
}
// Делаем редирект обратно
header('Location: personal_info.php?avatar_updated');

  echo json_encode($response);
  
}
