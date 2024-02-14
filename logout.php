<?php
session_start(); // Начинаем сессию

// Очищаем все сессионные данные
session_unset();

// Уничтожаем сессию
session_destroy();

// Перенаправляем пользователя на index.php
header("Location: index.php");
exit();
?>