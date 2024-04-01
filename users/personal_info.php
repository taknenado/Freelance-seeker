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
        color: #007bff;
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
        font-weight: bold;
        }

        select {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        line-height: 1.5;
        }

        select[disabled] {
        background-color: #f0f0f0;
        cursor: not-allowed;
        }

        select option {
        padding: 5px;
        }

        select option:checked {
        font-weight: bold;
        background-color: #007bff;
        color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <nav class="nav-menu">
            <a href="../index.php" class="logo">Your Logo</a>
            <ul class="nav-menu">
                <li><a href="about.php">ЗАКАЗЫ</a></li>
                <li><a href="../freelansers.php">ФРИЛАНСЕРЫ</a></li>
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

if (!isset($_SESSION['username']) && $_SERVER['SCRIPT_NAME'] != '/index.php') {
    header("Location: ../login.php");
    exit();
}

require_once("../DB_config.php");
require_once("../get_UserID.php");
require_once("../site_settings.php");

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $query = "SELECT username, email, phone, gender, user_type, profession, specialization FROM users WHERE user_id = ?";
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
        $profession = $row['profession'];
        $specialization = $row['specialization'];

        echo "<h2>Личный кабинет</h2>";
        echo "<div class='left-space'></div>";
        echo "<div class='user'>";


        // Запрос аватара
        $sql = "SELECT avatar_path FROM users WHERE user_id = $user_id";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $avatarPath = $row['avatar_path'];

       
        echo "<div class='avatar-container'>";
            echo "<div class='avatar-content'>";
                echo "<div class='avatar-content'>";
                if ($avatarPath) {
                    echo "<img src='$baseUrl$avatarPath' class='avatar'>";}
                echo "</div>";
                    echo "<div class='nickname'>";
                        echo "<p class='username'>$username</p>";
                    echo "</div>";
                echo "</div>";
            echo "<div class='avatar-actions'>";
                    echo "<form action='update_avatar.php' method='post' enctype='multipart/form-data'>";
                        echo "<div class='avatar-actions'>";
                            echo "<input type='file' name='avatar'>";
                            echo "<button type='submit'>Обновить аватар</button>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
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
            echo "<div style='display: flex;'>";
                echo "<div style='margin-right: 20px;'>";
                echo "<p><strong>Профессия:</strong></p>";
            echo "<select name='profession' id='profession'>";
                echo "<option value='0'>Выберите профессию</option>";
                echo "<option value='1'>Разработка сайтов</option>";
                echo "<option value='2'>Дизайн</option>";
                echo "<option value='3'>Арт</option>";
                echo "<option value='4'>Программирование</option>";
                echo "<option value='5'>Тексты</option>";
                echo "<option value='6'>Реклама/Маркетинг</option>";
                echo "<option value='7'>3D Графика/Анимация</option>";
                echo "<option value='8'>Архитектура / Интерьеры / Инжиниринг</option>";
                echo "<option value='9'>Оптимизация (SEO)</option>";
                echo "<option value='10'>Менеджмент</option>";
                echo "<option value='11'>Флеш</option>";
                echo "<option value='12'>Переводы</option>";
                echo "<option value='13'>Фотография</option>";
                echo "<option value='14'>Аудио/Видео</option>";
                echo "<option value='15'>Консалтинг</option>";
                echo "<option value='16'>Другое</option>";
                echo "<option value='17'>Соцсети</option>";
                echo "<option value='18'>Бухгалтерия</option>";
            echo "</select>";
                echo "</div>";
                echo "<div>";
                echo "<p><strong>Специализация:</strong></p>";
                echo "<select name='specialization' id='specialization' disabled>";
                echo "<option value='0'>Выберите свою специализацию</option>";
                echo "</select>";
                echo "</div>";
            echo "</div>";
            echo "<br><br>";
            echo "<button type='submit' class='save-button button-container'>Сохранить</button>";
            echo "</div>";
        echo "</form>";
        echo "<div id='TwoMenu'>";
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
            const avatarImg = document.querySelector('.avatar');
            avatarImg.src = data.avatarURL;
          } else {
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

  var professionSelect = document.getElementById("profession");
  var specializationSelect = document.getElementById("specialization");

  var specializationOptions = {
    1: ["Дизайн конверсионных лендингов", "Веб-программирование", "Верстка", "Дизайн сайтов", 'Сайт "под ключ"', "Системы администрирования (CMS)", "Флеш-сайты", "Прототипирование сайта", "Тестирование и аудит сайтов", "Разработка информационных порталов"],
    2: ["Баннеры", "Дизайн выставочных стендов", "Дизайн упаковки", "Иконки", "Интерфейсы", "Картография", "Логотипы", "Наружная реклама", "Полиграфическая верстка", "Полиграфия", "Предпечатная подготовка", "Презентации", "Промышленный дизайн", "Разработка шрифтов", "Технический дизайн", "Фирменный стиль", "Game-дизайн", "Дизайн мобильных приложений", "Дизайн мебели и предметов интерьера"],
    3: ["2D Персонажи", "Аэрография", "Векторная графика", "Граффити / роспись интерьеров / 3D-рисунки", "Живопись", "Иллюстрации", "Комиксы", "Концепт / Эскизы", "Мода / хенд мейд / дизайн одежды", "Открытки", "Рисунки", "Принты"],
    4: ["1С-программирование", "QA (тестирование)", "Базы данных", "Встраиваемые системы", "Защита информации", "Прикладное программирование", "Разработка мобильных приложений", "Программирование игр", "Проектирование", "Прочее программирование", "Системное программирование", "Системное администрирование", "Интеграция сайта с 1С: Бухгалтерия", "Установка платежных систем, онлайн-касс", "Разработка сложных калькуляторов", "Специалист по javascript"],
    5: ["Журналистика", "Контент-менеджер", "Копирайтинг", "Новости / Пресс-релизы", "Постинг", "Публикации", "Редактирование / Корректура", "Резюме", "Рерайтинг", "Рефераты / Курсовые / Дипломы", "Сканирование и распознавание", "Слоганы/Нейминг", "Статьи", "Стихи и проза на заказ", "ТЗ/Help/Мануал"],
    6: ["Комплексный маркетинг", "PR-менеджмент", "Бизнес-планы", "Исследования", "Контекстная реклама", "Медиапланирование", "Организация мероприятий", "Рекламные концепции", "Сбор и обработка информации", "Генерация лидов", "Вирусный маркетинг", "Крауд-маркетинг", "Создание/продвижение видеоконтента"],
    7: ["3D Анимация", "3D Персонажи", "Визуализация / Моделирование", "3D-архитектура", "Мультипликация"],
    8: ["Архитектор", "Дизайн интерьера", "Инжиниринг", "Ландшафтный дизайн", "Чертежи / Схемы"],
    9: ["Оптимизация (SEO)", "SEO-копирайтинг", "SEO-аудит", "Продвижение сайта по трафику", "Продвижение сайта по позициям"],
    10: ["Арт-директор", "Менеджер по персоналу", "Менеджер по продажам", "Менеджер проектов"],
    11: ["Flash / Flex-программирование", "Флеш-графика и анимация"],
    12: ["Корреспонденция / Деловая переписка", "Технический перевод", "Переводчик текстов", "Перевод с английского", "Перевод с немецкого", "Перевод с французского", "Перевод с китайского"],
    13: ["Архитектура / Интерьер", "Мероприятия", "Рекламная / Постановочная", "Репортажная", "Ретуширование / Коллажи", "Фотомодели", "Художественная / Арт"],
    14: ["Видеодизайн", "Видеомонтаж", "Написание музыки", "Работа со звуком", "Саунддизайн", "Видеопрезентации"],
    15: ["Бизнес консультирование", "Переводы / Тексты", "Юзабилити", "Юриспруденция", "Репетиторы английский язык", "Репетиторы ЕГЭ", "Блокчейн консалтинг по криптовалютам", "Фитнес-тренер по скайпу", "Консалтинг по онлайн-продажам"],
    16: ["Прочее"],
    17: ["Реклама в соцсетях", "Создание и ведение групп", "Продвижение на Youtube"],
    18: ["1С: Бухгалтерия 8", "Бухгалтерия: Торговля и Склад", "Бухгалтерский учет и налогообложение"],
    
  };

  professionSelect.addEventListener("change", function() {
    var selectedProfession = this.value;

    specializationSelect.innerHTML = "";

    if (selectedProfession in specializationOptions) {
      var options = specializationOptions[selectedProfession];

      for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.value = options[i];
        option.textContent = options[i];
        specializationSelect.appendChild(option);
        }

      specializationSelect.disabled = false;
    } else {
      var option = document.createElement("option");
      option.value = 0;
      option.textContent = "Выберите свою специальность";
      specializationSelect.appendChild(option);
      specializationSelect.disabled = true;
    }
  });
    </script>
</body>

</html>