<?php
session_start();

if(!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../login.php");
    exit(); 

}
require_once("../DB_config.php");
require_once("../get_UserID.php");

if(isset($_POST['phone'])) {

  $user_id = $_SESSION['user_id'];

  $phone = $_POST['phone'];
  $specialization = $_POST['specialization'];

  $sql = "UPDATE users SET phone='$phone', specialization='$specialization' WHERE user_id='$user_id'";

  if(mysqli_query($connection, $sql)) {
    $_SESSION['message'] = "Данные сохранены!"; 
  } else {
    $_SESSION['message'] = "Ошибка сохранения!";
  }

}

header("Location: personal_info.php");  

?>
