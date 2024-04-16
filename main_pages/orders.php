<?php
require_once("../includes/DB_config.php");

$sql = "SELECT * FROM orders";
$result = mysqli_query($connection, $sql);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}

mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/test2.css">
</head>
<body>
<style>
    .order-row {
        display: flex;
        align-items: center;
        width: 80%;
        margin-bottom: 20px;
    }

    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .company-name {
        margin-right: 10px;
    }

    .proposal-title {
        flex-grow: 1;
        margin-right: 10px;
    }

    .dates {
        font-size: 12px;
    }
</style>
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
                    <li><a href="register.php" class="button register-button">Зарегестрироваться</a></li>
                <?php
                }
                ?>
            </ul>
    </nav>
</header>
<button onclick="location.href='../orders/create_order.php'">Создать проект</button>
    <?php if (isset($successMessage)): ?>
        <div class="success-message">
            <?php echo $successMessage; ?>
            <button onclick="closeMessage()">Закрыть</button>
        </div>
    <?php endif; ?>
    <h1>Заявки</h1>
    <?php if (!empty($orders)): ?>
        <table class="orders-table">
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr class="order-row" onclick="window.location.href='../orders/order_details.php?order_id=<?php echo $order['order_id']; ?>'">
                        <td>
                            <img src="../uploads/avatars/default-avatar.png" alt="avatar" class="avatar">
                        </td>
                        <td class="company-name"><?php echo $order['company_name']; ?></td>
                        <td class="proposal-title"><?php echo $order['proposal_title']; ?></td>
                        <td class="dates">
                            <div>Дата создания: <?php echo $order['created_at']; ?></div>
                            <div>Дата окончания: <?php echo $order['end_date']; ?></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Нет доступных заявок.</p>
    <?php endif; ?>
    <script>
        function closeMessage() {
            var message = document.querySelector('.success-message');
            message.style.display = 'none';
        }
        function getAvatarUrl($userId) {
            $avatarPath = 'path/to/avatars/' . $userId + '.jpg';
            return $avatarPath;
        }
    </script>
</body>
</html>