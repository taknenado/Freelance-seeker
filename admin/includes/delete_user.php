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

  $order_query = "DELETE FROM orders WHERE user_id = '$user_id'";
  $order_result = mysqli_query($connection, $order_query);

  $user_query = "DELETE FROM users WHERE user_id = '$user_id'";
  $user_result = mysqli_query($connection, $user_query);

  if ($user_result && $order_result) {
    echo "Пользователь удален.";
  } else {
    echo "Ошибка при удалении пользователя.";
  }
}
?>