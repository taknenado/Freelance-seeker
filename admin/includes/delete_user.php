<?php
require_once("../../includes/DB_config.php");

if (isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];

  session_start();
  $current_user_id = $_SESSION['user_id'];
  if ($user_id == $current_user_id) {
    echo "Невозможно удалить текущего пользователя.";
    exit;
  }
  $query = "DELETE FROM users WHERE user_id = '$user_id'";
  $result = mysqli_query($connection, $query);

  if ($result) {
    echo "Пользователь успешно удален.";
  } else {
    echo "Ошибка при удалении пользователя.";
  }
}
?>