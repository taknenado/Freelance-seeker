<?php
// Данные для подключения к MySQL
$hostname = "localhost";
$username = "root";
$password = "";
$database = "account_registration";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>