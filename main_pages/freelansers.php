<?php
require_once("../includes/DB_config.php");
require_once("../includes/site_settings.php");

// Варианты фильтрации пользователей
$filters = array(
    "Разработка сайтов" => "Разработка сайтов",
    "Дизайн" => "Дизайн",
    "Арт" => "Арт",
    "Программирование" => "Программирование",
    "Тексты" => "Тексты",
    "Реклама/Маркетинг" => "Реклама/Маркетинг",
    "3D Графика/Анимация" => "3D Графика/Анимация",
    "Архитектура / Интерьеры / Инжиниринг" => "Архитектура / Интерьеры / Инжиниринг",
    "Оптимизация (SEO)" => "Оптимизация (SEO)",
    "Менеджмент" => "Менеджмент",
    "Флеш" => "Флеш",
    "Переводы" => "Переводы",
    "Фотография" => "Фотография",
    "Аудио/Видео" => "Аудио/Видео",
    "Консалтинг" => "Консалтинг",
    "Другое" => "Другое",
    "Соцсети" => "Соцсети",
    "Бухгалтерия" => "Бухгалтерия"
);

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$sql = "SELECT * FROM users";

if (!empty($filter)) {
  $sql .= " WHERE profession = '$filter'";
}

$result = mysqli_query($connection, $sql);
$users = array();

while($row = mysqli_fetch_assoc($result)) {
  $users[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница пользователя</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/test2.css">
    
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

.user-info {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
}

.text-container {
    flex-grow: 1;
    text-align: left;
}

.card-title {
    margin: 0;
}

.card-subtitle {
    margin: 0;
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

.form-inline {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-bottom: 10px;
    }

    .form-group {
        margin-right: 10px;
    }

    .form-group label {
        margin-right: 5px;
    }

    .form-group select {
        padding: 5px;
        border-radius: 4px;
    }

    .btn {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
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
            <li><a href="orders.php">ЗАКАЗЫ</a></li>
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
                        <a href="../users/personal_info.php" class="button userinfo_button">
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
    <div class="clear"><br></div> 
    <form id="filter-form" method="GET" class="form-inline">
        <div class="form-group">
            <label for="filter">Фильтр:</label>
            <select name="filter" id="filter">
                <option value="">Все</option>
                <?php foreach ($filters as $option => $value): ?>
                    <option value="<?php echo $value; ?>" <?php if ($filter === $value) echo 'selected'; ?>><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group"> <!-- Новый контейнер для кнопки -->
            <button type="submit" class="btn">Применить</button>
        </div>
    </form>
    <div class="container">
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $user): ?>
              <div class="card">
                  <div class="card-body">
                      <div class="user-info">
                          <div class="avatar-container">
                              <img src="<?php echo $baseUrl . $user['avatar_path']; ?>" class="avatar">
                          </div>
                          <div class="text-container">
                              <h5 class="card-title">
                                  <span><?php echo $user['username']; ?></span>
                              </h5>
                              <h6 class="card-subtitle">
                              <span><?php echo $user['profession'] . " / " . $user['specialization']; ?></span>
                              </h6>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Ничего не найдено.</p>
        <?php endif; ?>
    </div>
<div class="clear"><br><br></div>

</body>
</html>