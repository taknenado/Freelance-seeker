<!DOCTYPE html>
<html>
<head>
  <title>Вход</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="css/reg_log_style.css">
</head>

<body>
  <main class="main">
    <div class="button-container">
      <a href="index.php" class="button">На главную</a>
    </div>

    <h1>Вход</h1>

    <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error === "invalid_credentials") {
        echo '<p class="error-message">Неверные учетные данные.</p>';
      }
    }
    ?>

    <form action="login_process.php" method="POST" class="center">
      <label for="username">Имя пользователя:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Пароль:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" class="button">Войти</button>
    </form>

    <div class="center">
      <p>Нет аккаунта? <a href="registration.php">Зарегистрироваться</a></p>
    </div>
  </main>
</body>
</html>