<?php
require_once("../includes/DB_config.php");

// Поиск пользователей по никнейму
if (isset($_POST['search'])) {
  $search = $_POST['search'];

  $query = "SELECT * FROM users WHERE username LIKE '%$search%'";
  $result = mysqli_query($connection, $query);
} else {
  $query = "SELECT * FROM users";
  $result = mysqli_query($connection, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Список пользователей</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

  .personal-info-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
  }
  
  .personal-info-btn:hover {
    background-color: #45a049;
  }
  </style>

  <script>
    // Функция для отправки запроса на сервер и обновления списка пользователей
    function searchUsers() {
      var searchValue = document.getElementById('search-input').value;
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          document.getElementById('user-list').innerHTML = xhr.responseText;
        }
      };
      xhr.open('POST', 'includes/search_users.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send('search=' + searchValue);
    }
  </script>

</head>
<body>
<div class="container">
    <a href="../users/personal_info.php" class="personal-info-btn">Личный кабинет</a>
  <h1>Список пользователей</h1>
    <div class="search-container">
      <input type="text" id="search-input" placeholder="Поиск по никнейму" oninput="searchUsers()">
    </div>
    <table>
      <thead>
        <tr>
          <th>Аватар</th>
          <th>ID</th>
          <th>Имя пользователя</th>
          <th>Email</th>
          <th>Пароль</th>
          <th>Дата рождения</th>
          <th>Тип пользователя</th>
          <th>Телефон</th>
          <th>Пол</th>
          <th>Профессия</th>
          <th>Специализация</th>
        </tr>
      </thead>
      <tbody id="user-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><img class="user-avatar" src="..<?php echo $row['avatar_path']; ?>" alt="Аватар"></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['birthdate']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['profession']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>