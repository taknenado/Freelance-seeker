<?php
require_once("../includes/DB_config.php");

if ($_SESSION['user_type'] === 'A') {
    echo '<a href="../admin/all_users.php">Панель администратора</a>';
}

?>