<?php
session_start();
require_once("DB_config.php");
require_once("get_UserID.php");
require_once("site_settings.php");

$category = $_POST['category'];
$proposalType = $_POST['vid'];
$payment = $_POST['oplata'];
$budget = $_POST['budget'];
$end_date = $_POST['end_date'];
$currency = $_POST ['currency']; 
$proposalTitle = $_POST['name_work'];
$companyName = $_POST['company'];
$proposalDescription = $_POST['mess'];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("Ошибка: user_id не найден.");
}
if (empty($companyName) && isset($_SESSION['username'])) {
    $companyName = $_SESSION['username'];
}
$sql = "INSERT INTO orders (user_id, category, proposal_type, payment, budget, currency, proposal_title, company_name, proposal_description, created_at, end_date) 
        VALUES ('$user_id', '$category', '$proposalType', '$payment', '$budget', '$currency', '$proposalTitle', '$companyName', '$proposalDescription', CURDATE(), '$end_date')";

if (mysqli_query($connection, $sql)) {
    mysqli_close($connection);
    $_SESSION['success_message'] = "Заявка успешно создана.";
    header("Location: ../main_pages/orders.php");
    exit();
} else {
    echo "Ошибка записи данных: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
