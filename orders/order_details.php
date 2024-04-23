<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }

        .order-info {
            margin-bottom: 20px;
        }

        .order-info span {
            font-weight: bold;
        }

        .order-info .label {
            margin-right: 5px;
        }

        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    require_once("../includes/DB_config.php");
    if (isset($_GET['order_id'])) {
        $orderId = $_GET['order_id'];

        $query = "SELECT * FROM orders WHERE order_id = '$orderId'";
        $result = mysqli_query($connection, $query);
        $order = mysqli_fetch_assoc($result);

        if ($order) {
    ?>
    <h1>Информация о заявке</h1>
    <div class="order-info">
        <span class="label">ID:</span> <?php echo $order['order_id']; ?>
    </div>
    <div class="order-info">
        <span class="label">Название компании:</span> <?php echo $order['company_name']; ?>
    </div>
    <div class="order-info">
        <span class="label">Заголовок заявки:</span> <?php echo $order['proposal_title']; ?>
    </div>
    <div class="order-info">
        <span class="label">Категория заявки:</span> <?php echo $order['category']; ?>
    </div>
    <div class="order-info">
        <span class="label">Способ оплаты:</span> <?php echo $order['payment']; ?>
    </div>
    <div class="order-info">
        <span class="label">Сумма:</span> <?php echo $order['budget'] . ' ' . $order['currency']; ?>
    </div>
    <div class="order-info">
        <span class="label">Заголовок предложения:</span> <?php echo $order['proposal_title']; ?>
    </div>
    <div class="order-info">
        <span class="label">Описание:</span> <?php echo $order['proposal_description']; ?>
    </div>
    <div class="order-info">
        <span class="label">Создано:</span> <?php echo $order['created_at']; ?>
    </div>
    <div class="order-info">
        <span class="label">Срок исполнения:</span> <?php echo $order['end_date']; ?>
    </div>
    <a class="back-button" href="../main_pages/orders.php">&larr; Вернуться назад</a>
    <?php
        } else {
            echo "<p>Заявка не найдена.</p>";
        }
    } else {
        echo "<p>Идентификатор заявки не указан.</p>";
    }

    mysqli_close($connection);
    ?>
</body>
</html>