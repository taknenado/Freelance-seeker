<?php
// Подключение к базе данных
$host = "localhost";
$username = "root";
$password = "";
$dbname = "account_registration";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Получение введенных пользователем данных
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Проверка введенных данных на соответствие требованиям
  // ...

  // Проверка, существует ли пользователь с введенным именем пользователя и паролем в базе данных
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Пользователь аутентифицирован, выполнить вход
    session_start();
    $_SESSION["username"] = $username;
    // Дополнительные действия после успешного входа
    // ...
    header("Location: dashboard.php");
    exit();
  } else {
    // Если пользователь не найден или введены неверные учетные данные, перенаправить обратно на страницу входа с сообщением об ошибке
    $error = "invalid_credentials";
    header("Location: login.php?error=$error");
    exit();
  }
}

// Если не была отправлена форма, перенаправить на страницу входа
header("Location: login.php");
exit();
?>