<?php
session_start();
require_once("DB_config.php");
require_once("get_UserID.php");
require_once("site_settings.php");

$category = $_POST['category'];
$proposalType = $_POST['vid'];
$payment = $_POST['oplata'];
$budget = $_POST['budget'];
$currency = $_POST ['currency']; 
$proposalTitle = $_POST['name_work'];
$companyName = $_POST['company'];
$proposalDescription = $_POST['mess'];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("Ошибка: user_id не найден.");
}

$sql = "INSERT INTO orders (user_id, category, proposal_type, payment, budget, currency, proposal_title, company_name, proposal_description) 
        VALUES ('$user_id', '$category', '$proposalType', '$payment', '$budget', '$currency', '$proposalTitle', '$companyName', '$proposalDescription')";

if (mysqli_query($connection, $sql)) {
    echo "Данные успешно записаны";
} else {
    echo "Ошибка записи данных: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
