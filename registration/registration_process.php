<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="../css/reg_log_style.css">
</head>
<body>
</body>
</html>
<?php
require_once("../DB_config.php");

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    birthdate DATE NOT NULL,
    user_type ENUM('freelanser', 'employer') NOT NULL
)";

if ($conn->query($sql) === TRUE || $conn->query($sql) === FALSE) {
    $email = $_POST['email'];
    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: register.php?error=email_exists");
        $conn->close();
        exit();
    }

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: register.php?error=username_exists");
        $conn->close();
        exit();
    }

    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $user_type = 'freelanser';

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone, gender, birthdate, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $email, $password, $phone, $gender, $birthdate, $user_type);

    if ($stmt->execute()) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
        <title>Регистрация успешна</title>
        <style>
        body {
            text-align: center;
        }
        h1 {
            text-transform: uppercase;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button-container button:hover {
            background-color: #45a049;
        }
        </style>
        </head>
        <body>
        <h1>РЕГИСТРАЦИЯ УСПЕШНА!</h1>
        <p>Поздравляем! Вы успешно зарегистрированы.</p>
        <p>Теперь вы можете войти на свою учетную запись.</p>
        <form action='../index.php'>
        <div class='button-container'>
            <button type='submit'>Вернуться на главную страницу</button>
        </div>
        </form>
        </body>
        </html>";
    } else {
        echo "Ошибка при добавлении данных пользователя: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>