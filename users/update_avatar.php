<?php
require_once '../check_auth.php';
require_once '../DB_config.php';
session_start();
// Обработка загрузки файла аватарки
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $avatarFile = $_FILES['avatar'];
    $userId = $_POST['user_id']; // Предполагая, что вы передаете ID пользователя из формы

    // Проверка наличия ошибок при загрузке файла
    if ($avatarFile['error'] === UPLOAD_ERR_OK) {
        $tempPath = $avatarFile['tmp_name'];
        $fileName = $avatarFile['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Генерация уникального имени файла
        $newFileName = uniqid('avatar_') . '.' . $fileExtension;

        // Путь для сохранения файла
        $uploadPath = 'avatars/' . $newFileName;

        // Перемещение загруженного файла в папку
        if (move_uploaded_file($tempPath, $uploadPath)) {
            // Обновление пути к аватарке в базе данных
            $sql = "UPDATE users SET avatar = '$newFileName' WHERE user_id = $user_id";

            if ($conn->query($sql) === TRUE) {
                echo "Аватар успешно обновлен";
            } else {
                echo "Ошибка при обновлении аватара: " . $conn->error;
            }
        } else {
            echo "Ошибка при сохранении файла";
        }
    } else {
        echo "Ошибка при загрузке файла: " . $avatarFile['error'];
    }
} else {
    echo "Недопустимый запрос";
}

// Закрытие соединения с базой данных
$conn->close();
$response = array(
    'success' => true,
    'avatarURL' => $updatedAvatarURL
  );
  echo json_encode($response);
?>