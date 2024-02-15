<?php
// Данные для подключения к MySQL
$hostname = "localhost";
$username = "root";
$password = "";
$database = "account_registration";

$connection = mysqli_connect($hostname, $username, $password, $database);
if (!$connection) {
  die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}
?>