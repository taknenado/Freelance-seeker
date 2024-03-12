<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav_menu.css">
    <style>
        
        .left-space {
        margin-left: 20px;
        }
        .avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        }
        .nav-menu a {
            margin-right: 10px;
        }
        .save-button{
        display: inline-block;
        background-color: #00FF00;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        }
        .user {
        display: flex;
        align-items: center; 
        }
        .username {
        margin: auto 10px;
        font-size: 25px
        }
        #TwoMenu A {
        text-decoration: underline;
        margin-right: 10px;
        font-size: 15px;
        font-weight: bold;
        font-family: 'OpenSansBold', Arial;
        color: #15A0A5;
        }
        .selected_menu {
        font-size: 15px;
        font-weight: bold;
        font-family: 'OpenSansBold', Arial;
        color: #343434;
        margin-right: 10px;
        }
        .avatar-content {
            display: flex;
            align-items: center;
        }

        .nickname {
            margin-left: 10px;
        }

        .avatar-dropdown {
    position: relative;
}

.avatar-container,
.dropdown-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.dropdown-content {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.avatar-dropdown:hover .dropdown-content,
.avatar-dropdown:hover .avatar-container,
.dropdown-content:hover {
    opacity: 1;
    visibility: visible;
}

.hidden {
    display: none;
}
    </style>
</head>
<body>
<header>
<nav class="nav-menu">
        <a href="../index.php" class="logo">Your Logo</a>
        <ul class="nav-menu">
            <li><a href="about.php">ЗАКАЗЫ</a></li>
            <li><a href="services.php">ФРИЛАНСЕРЫ</a></li>
            <li><a href="contact.php">ПОРТФОЛИО</a></li>
            <li><a href="contact.php">УСЛУГИ</a></li>
            <li><a href="contact.php">ВАКАНСИИ</a></li>
        </ul> 
        <ul>   
            <li><a href="../logout.php" class="logout_button button-container">Выйти</a></li>
            
        </ul>
    </nav>
</header>
<div class="left-space">
<?php

session_start();

if(!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../login.php");
    exit(); 

}
require_once("../DB_config.php");
require_once("../get_UserID.php");

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $query = "SELECT username, email, phone, gender, user_type FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Проверка наличия результатов запроса
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $user_type = $row['user_type'];

        echo "<h2>Личный кабинет</h2>";
        echo "<div class='left-space'></div>";
        echo "<div class='user'>";
        echo "<div class='avatar-dropdown' onmouseenter='showButton()' onmouseleave='hideButton()'>";
        echo "<div class='dropdown-content'>";
        echo "<button class='hidden' onclick='openFileSelector()'>Обновить фотографию</button>";
        echo "</div>";
        $avatarPath = 'avatars/';
        
        // Проверка наличия пути к аватарке
        if (!empty($avatarPath)) {
            echo "<img src='$avatarPath' alt='User Avatar'>";
        } else {
            echo "<img src='avatars/default-avatar.jpg' alt='Default Avatar'>";
        }
        echo "</div>";
        echo "</div>";
        echo "<br>";
        echo "<p><a href='#' onclick='toggleProfileFields()'>Редактировать профиль</a></p>";
            echo "<form action='save_profile.php' method='post'>";
                echo "<div id='profileFields' style='display: none;'>";
                    echo "<p><strong>Почта:</strong> $email</p>";
                    echo "<input type='text' id='phone' name='phone' placeholder='+7 (___) ___-__-__' value='$phone'>"; 
                    echo "<p><strong>Пол:</strong> $gender</p>";
                    echo "<p><strong>Тип пользователя:</strong> $user_type</p>";
                    echo "<button type='submit' class='save-button button-container'>Сохранить</button>";
                echo "</div>"; 
            echo "</form>";
        echo "<div id='TwoMenu'";
            echo "<p><span class='selected_menu'>Портфолио</span>"; 
            echo "<a href='about_me.php'>Обо мне</a>"; 
            echo "<a href='contact.php'>Контакты</a>"; 
            echo "<a href='reviews.php'>Отзывы</a></p>";
        echo "</div>";
    } else {
        echo "Данные пользователя не найдены.";
    }
} else {
    echo "Идентификатор пользователя не установлен.";
}

mysqli_close($connection);
?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $("#phone").mask("+7 (999) 999-99-99");

    function toggleProfileFields() {
        var profileFields = document.getElementById('profileFields');
        if (profileFields.style.display === 'none') {
            profileFields.style.display = 'block';
        } else {
            profileFields.style.display = 'none';
        }
    }

    function openFileSelector() {
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'image/*';
        fileInput.onchange = handleFileUpload;
        fileInput.click();
    }

    function handleFileUpload(event) {
  const file = event.target.files[0];
  const formData = new FormData();
  formData.append('avatar', file);

  fetch('update_avatar.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Обновление аватара на странице
        const avatarImg = document.querySelector('.avatar');
        avatarImg.src = data.avatarURL;
      } else {
        // Обработка ошибки
        console.error(data.error);
      }
    })
    .catch(error => {
      console.error('Произошла ошибка:', error);
    });
}
    let hideTimeout;
  let buttonVisible = false;
  
  function showButton() {
    clearTimeout(hideTimeout);
    const button = document.querySelector('.dropdown-content button');
    button.classList.remove('hidden');
    buttonVisible = true;
  }

  function hideButton() {
    hideTimeout = setTimeout(() => {
      if (!buttonVisible) {
        const button = document.querySelector('.dropdown-content button');
        button.classList.add('hidden');
      }
      buttonVisible = false;
    }, 500);
  }
</script>
</body>
</html>