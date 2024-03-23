<?php
require_once("DB_config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = $connection->query($sql);

  if ($result->num_rows == 1) {

    session_start();
    $_SESSION["username"] = $username;
    header("Location: user_page.php");
    exit();
  } else {

    $error = "invalid_credentials";
    header("Location: login.php?error=$error");
    exit();
  }
}

header("Location: login.php");
exit();
?>