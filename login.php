<!DOCTYPE html>
<html>
<head>
  <title>Вход</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/login_style.css"> -->
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
      <input type="text" id="username" name="username" required placeholder="Логин">

      <input type="password" id="password" name="password" required placeholder="Пароль">

      <button type="submit" class="button">Войти</button>
    </form>

    <div class="center">
      <p>Нет аккаунта? <a href="registration/register.php">Зарегистрироваться</a></p>
    </div>
  </main>
</body>
</html>