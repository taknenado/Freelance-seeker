<?php
require_once('check_auth.php');
require_once("DB_config.php");
require_once("get_UserID.php");
require_once("site_settings.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница пользователя</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav_menu.css">
    
    <style>
    .button-container {
        display: flex;
        justify-content: flex-start;
  }
  
  .logout_button {
        display: inline-block;
        background-color: #eb1639;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        margin-top: 20px;
  }
    </style>
</head>
<body>
    <header>
        <nav class="nav-menu">
            <a href="index.php" class="logo">Your Logo</a>
            <ul class="nav-menu">
            <li><a href="about.php">ЗАКАЗЫ</a></li>
            <li><a href="freelansers.php">ФРИЛАНСЕРЫ</a></li>
            <li><a href="contact.php">ПОРТФОЛИО</a></li>
            <li><a href="contact.php">УСЛУГИ</a></li>
            <li><a href="contact.php">ВАКАНСИИ</a></li>
            </ul> 
            <ul>   
            <li class="right-align"><a href="users/personal_info.php" class="button userinfo_button"><?php echo $_SESSION['username']; ?></a></li>
            </ul>
        </nav>
    </header>

    <?php

// Подключение к БД
require_once("DB_config.php");

// Запрос на получение данных пользователей
$sql = "SELECT username, avatar_path FROM users";
$result = mysqli_query($connection, $sql);

// Массив для данных пользователей
$users = []; 

// Заполнение массива данными из запроса 
while($row = mysqli_fetch_assoc($result)) {
  $users[] = $row;
}

?>

<div class="container">

  <div class="row">

    <div class="col-md-4">
      <?php foreach ($users as $user): ?>
        <div class="card">
        <img src="<?php echo $baseUrl . $user['avatar_path']; ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $user['username']; ?></h5>
            <!-- другие данные по необходимости -->
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-md-4">
      <!-- аналогичный код для 2 столбца -->
    </div>

    <div class="col-md-4">
       <!-- аналогичный код для 3 столбца -->
    </div>

  </div>

</div>

</body>
</html>