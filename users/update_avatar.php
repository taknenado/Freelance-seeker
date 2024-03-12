<?php
// Получение загруженного изображения
$avatarFile = $_FILES['avatar'];

// Обработка изображения, изменение размера и сохранение

// Возврат URL обновленного аватара в формате JSON
$response = array(
  'success' => true,
  'avatarURL' => 'новый_путь_к_аватару'
);
header('Content-Type: application/json');
echo json_encode($response);
?>