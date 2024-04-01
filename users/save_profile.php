<?php
session_start();

if(!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../login.php");
    exit(); 

}
require_once("../DB_config.php");
require_once("../get_UserID.php");
$professions = array(
  '0' => 'Выберите профессию',
  '1' => 'Разработка сайтов',
  '2' => 'Дизайн',
  '3' => 'Арт',
  '4' => 'Программирование',
  '5' => 'Тексты',
  '6' => 'Реклама/Маркетинг',
  '7' => '3D Графика/Анимация',
  '8' => 'Архитектура / Интерьеры / Инжиниринг',
  '9' => 'Оптимизация (SEO)',
  '10' => 'Менеджмент',
  '11' => 'Флеш',
  '12' => 'Переводы',
  '13' => 'Фотография',
  '14' => 'Аудио/Видео',
  '15' => 'Консалтинг',
  '16' => 'Другое',
  '17' => 'Соцсети',
  '18' => 'Бухгалтерия'
);
if(isset($_POST['phone'])) {

  $user_id = $_SESSION['user_id'];

  $phone = $_POST['phone'];
  $professionValue = $_POST['profession'];
  $profession = isset($professions[$professionValue]) ? $professions[$professionValue] : 'Другое';
  $specialization = $_POST['specialization'];
  

  $sql = "UPDATE users SET phone='$phone', specialization='$specialization', profession='$profession' WHERE user_id='$user_id'";

  if(mysqli_query($connection, $sql)) {
    $_SESSION['message'] = "Данные сохранены!"; 
  } else {
    $_SESSION['message'] = "Ошибка сохранения!";
  }

}

header("Location: personal_info.php");  

?>
