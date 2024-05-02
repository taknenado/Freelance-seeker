<?php
require_once("../includes/check_auth.php");
require_once("../includes/DB_config.php");

$sql = "SELECT orders.*, users.avatar_path 
        FROM orders 
        INNER JOIN users ON orders.user_id = users.user_id";
$result = mysqli_query($connection, $sql);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}

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
    <style>

.orders-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
        }

        .order-card {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 350px;
            height: 200px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
        }

        .order-card:hover {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .order-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .order-card .avatar-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 10px;
        }

        .order-card .avatar-container img {
            margin-right: 10px;
        }

        .order-card .company-name {
            font-weight: bold;
            
        }

        .order-card .category {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .order-card .proposal-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .centered {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center; 
        }

        .order-card .dates {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 12px;
            color: #888;
            
        }

        .order-card .description {
            font-size: 14px;
            color: #333;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .order-card .price {
            position: absolute;
            top: 10px;
            right: 10px;
            font-weight: bold;
        }

        .create-project-button {
            text-align: right;
            padding: 10px;
        }

        .create-project-button .button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
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
<?php
    require_once("../includes/get_UserID.php");
    $sql = "SELECT user_type FROM users WHERE user_id = '$user_id'";
    $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        $user_type = $row["user_type"];
        if ($user_type === 'E' or $user_type === 'A') {
            echo '
            <div class="create-project-button">
                <a href="../orders/create_order.php" class="button">Создать проект</a>
            </div>
            ';
        }
        
    ?>

<?php if (!empty($orders)): ?>
    <div class="orders-container">
        <?php foreach ($orders as $order) { ?>
            <div class="order-card" onclick="window.location.href='../orders/order_details.php?order_id=<?php echo $order['order_id']; ?>'">
                <div class="avatar-container">
                    <img src="<?php echo '..' . $order['avatar_path']; ?>" alt="avatar">
                    <div class="company-name"><?php echo $order['company_name']; ?></div>
                </div>
                <div class="category"><?php echo $order['category']; ?></div>
                <div class="proposal-title centered"><?php echo $order['proposal_title']; ?></div>
                <div class="description"><?php echo $order['proposal_description']; ?></div>
                <div class="dates">
                            <span class="label">Срок исполнения:</span> <?php echo $order['end_date']; ?>
                    </div>
                <div class="price"><?php echo $order['budget'] . ' ' . $order['currency']; ?></div>
            </div>
        <?php } ?>
    </div>
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