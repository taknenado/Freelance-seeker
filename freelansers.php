<?php
require_once("DB_config.php");
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
  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .card {
  display: flex;
  justify-content: flex-start;
  width: calc(32.33% - 20px);
  margin: 10px;
  text-align: center;
  border: 1px solid #000;
  border-radius: 5px;
}

.avatar-container {
  display: flex;
  align-items: center;
  margin-left: 10px;
  padding: 10px;
}

.avatar {
  width: 90px;
  height: 90px;
  border-radius: 50%;
}

.card-title {
  margin-left: 10px;
}
@media (max-width: 1000px) {
  .container {
    justify-content: center;
  }
}
@media (max-width: 1000px) {
  .card {
    width: calc(50% - 20px);
  }
}

@media (max-width: 600px) {
  .card {
    width: 100%;
  }
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
                <?php
                session_start();

                if (isset($_SESSION['username'])) {
                ?>
                    <li class="right-align">
                        <a href="users/personal_info.php" class="button userinfo_button">
                        <?php echo $_SESSION['username']; ?>
                        </a>
                    </li>
                <?php  
                } else {
                ?>
                    <li><a href="login.php" class="button login-button">Войти</a></li>
                    <li><a href="registration/register.php" class="button register-button">Зарегестрироваться</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>

    <?php

$sql = "SELECT username, avatar_path FROM users";
$result = mysqli_query($connection, $sql);

$users = []; 

while($row = mysqli_fetch_assoc($result)) {
  $users[] = $row;
}

?>
<div class="clear"><br><br></div>
<div class="container">
  <?php foreach ($users as $user): ?>
  <div class="card">
    <div class="card-body">
      <div class="avatar-container">
        <img src="<?php echo $baseUrl . $user['avatar_path']; ?>" class="avatar">
        <h5 class="card-title"><?php echo $user['username']; ?></h5>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

</body>
</html>