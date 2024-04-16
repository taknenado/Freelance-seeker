<?php
require_once("../includes/DB_config.php");
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    $query = "SELECT * FROM orders WHERE order_id = '$orderId'";
    $result = mysqli_query($connection, $query);
    $order = mysqli_fetch_assoc($result);

    if ($order) {
        echo "ID: " . $order['order_id'] . "<br>";
        echo "Название компании: " . $order['company_name'] . "<br>";
        echo "Заголовок заявки: " . $order['proposal_title'] . "<br>";
        echo "Категория заявки: " . $order['category'] . "<br>";
        echo "Способ оплаты: " . $order['payment'] . "<br>";
        echo "Сумма:" . $order['budget'] . ' ' . $order['currency'] . "<br>";
        echo "Заголовок предложения: " . $order['proposal_title'] . "<br>";
        echo "Описание: " . $order['proposal_description'] . "<br>";
        echo "Создано: " . $order['created_at'] . "<br>";
        echo "Дата окончания: " . $order['end_date'] . "<br>";
    } else {
        echo "Заявка не найдена.";
    }
} else {
    echo "Идентификатор заявки не указан.";
}

mysqli_close($connection);
?>