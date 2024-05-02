<?php
require_once("../../includes/DB_config.php");

session_start();
$current_user_id = $_SESSION['user_id'];

// Поиск пользователей по никнейму
if (isset($_POST['search'])) {
  $search = $_POST['search'];

  $query = "SELECT * FROM users WHERE username LIKE '%$search%' AND user_id != '$current_user_id'";
  $result = mysqli_query($connection, $query);
} else {
  $query = "SELECT * FROM users WHERE user_id != '$current_user_id'";
  $result = mysqli_query($connection, $query);
}

$html = '';
while ($row = mysqli_fetch_assoc($result)) {
  $html .= '<tr>';
  $html .= '<td><img class="user-avatar" src="..' . $row['avatar_path'] . '" alt="Аватар"></td>';
  $html .= '<td>' . $row['user_id'] . '</td>';
  $html .= '<td>' . $row['username'] . '</td>';
  $html .= '<td>' . $row['email'] . '</td>';
  $html .= '<td>' . $row['password'] . '</td>';
  $html .= '<td>' . $row['birthdate'] . '</td>';
  $html .= '<td>' . $row['user_type'] . '</td>';
  $html .= '<td>' . $row['phone'] . '</td>';
  $html .= '<td>' . $row['gender'] . '</td>';
  $html .= '<td>' . $row['profession'] . '</td>';
  $html .= '<td>' . $row['specialization'] . '</td>';
  $html .= '</tr>';
}

// Отправка ответа в формате HTML
echo $html;
?>