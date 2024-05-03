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

const changeAvatarBtn = document.getElementById('changeAvatarBtn');
const avatarModal = document.getElementById('avatarModal');
const avatarInput = document.getElementById('avatarInput');
const avatarPreview = document.getElementById('avatarPreview');
const closeBtn = document.querySelector('#close-btn'); // Найти кнопку закрытия

changeAvatarBtn.addEventListener('click', function() {
    avatarModal.style.display = 'block';
});

avatarInput.addEventListener('change', function() {
    const file = avatarInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            avatarPreview.innerHTML = '<img src=\"' + e.target.result + '\" alt=\"Avatar\">';
        };
        reader.readAsDataURL(file);
    } else {
        avatarPreview.innerHTML = '';
    }
});

// Закрытие модального окна при клике на кнопку закрытия
closeBtn.addEventListener('click', function() {
    avatarModal.style.display = 'none';
});

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