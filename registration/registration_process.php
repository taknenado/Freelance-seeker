<?php
// Получение данных из формы регистрации и другая логика...

// Создание подключения к базе данных
$conn = new mysqli("localhost", "root", "", "account_registration");

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка уникальности почты или никнейма
$email = $_POST['email'];
$username = $_POST['username'];

// Проверка почты
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Адрес электронной почты уже используется
    header("Location: register.php?error=email_exists");
    $conn->close();
    exit();
}

// Проверка никнейма
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Никнейм уже используется
    echo "Никнейм уже зарегистрирован.";
    $conn->close();
    exit();
}

// Создание таблицы "users", если она не существует
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    birthdate DATE NOT NULL,
    user_type ENUM('regular', 'admin') NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // Таблица "users" создана успешно или уже существует

    // Добавление данных пользователя в таблицу "users"
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $user_type = 'regular'; // Предполагая, что обычный пользователь (не администратор)

    // Подготовка SQL-запроса с использованием подготовленных выражений
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone, gender, birthdate, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $email, $password, $phone, $gender, $birthdate, $user_type);

    if ($stmt->execute()) {
        // Данные пользователя успешно добавлены в таблицу "users"

        // Перенаправление на страницу успешной регистрации
        header('Location: registration_success.php');
        exit();
    } else {
        // Ошибка при добавлении данных пользователя
        echo "Ошибка при добавлении данных пользователя: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Ошибка при создании таблицы "users"
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
