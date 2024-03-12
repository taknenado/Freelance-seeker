<?php
require_once('check_auth.php');
?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/nav_menu.css">
        <link rel="stylesheet" href="css/test.css">
        <link rel="stylesheet" href="css/test2.css">
    </head>

    <body>
        <header>
            <nav class="nav-menu">
                <a href="index.php" class="logo">Your Logo</a>
                <ul class="nav-menu">
                    <li><a href="about.php">ЗАКАЗЫ</a></li>
                    <li><a href="services.php">ФРИЛАНСЕРЫ</a></li>
                    <li><a href="contact.php">ПОРТФОЛИО</a></li>
                    <li><a href="contact.php">УСЛУГИ</a></li>
                    <li><a href="contact.php">ВАКАНСИИ</a></li>
                </ul>
                <ul>
                    <li class="right-align">
                        <a href="users/personal_info.php" class="button userinfo_button">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>

        <h1>Добавление нового проекта</h1>
        <span class="text_green">Поля, отмеченные <font class="error">*</font> - обязательны для заполнения</span>
        <br/>
        <br/>
        <span id="editors">
<style> 
.jq-selectbox__select{ width: 338px !important; }
#BDUGET .jq-selectbox__select{ width: 70px !important; }
</style>
<form action="add_project.php" method="POST" enctype="multipart/form-data">
<table  class="table table-striped table-bordered table-responsive">
<tr>
<td width="170">
Категория <font class="error">*</font>
</td>
<td width="*" align="left" style="padding-bottom:3px" colspan="2">
        <select required name="category"><option></option>
     <option value="3D-графика и моделирование"  >3D-графика и моделирование</option>
     <option value="iOs, Android приложения"  >iOs, Android приложения</option>
     <option value="Анимация и мультипликация"  >Анимация и мультипликация</option>
     <option value="Архитектура / Дизайн интерьера / Ландшафт"  >Архитектура / Дизайн интерьера / Ландшафт</option>
     <option value="Аудио/Видео"  >Аудио/Видео</option>
     <option value="Аэрография / Граффити"  >Аэрография / Граффити</option>
     <option value="Бухгалтерия"  >Бухгалтерия</option>
     <option value="Верстка полиграфии"  >Верстка полиграфии</option>
     <option value="Верстка сайтов"  >Верстка сайтов</option>
     <option value="Дизайн полиграфии и POS-материалов"  >Дизайн полиграфии и POS-материалов</option>
     <option value="Дизайн сайтов / приложений / интерфейсов"  >Дизайн сайтов / приложений / интерфейсов</option>
     <option value="Доработка и улучшение сайтов"  >Доработка и улучшение сайтов</option>
     <option value="Иллюстрации / Картины / Арт"  >Иллюстрации / Картины / Арт</option>
     <option value="Инжиниринг / Черчение"  >Инжиниринг / Черчение</option>
     <option value="Конкурсы"  >Конкурсы</option>
     <option value="Консалтинг / Обучение / Аналитика"  >Консалтинг / Обучение / Аналитика</option>
     <option value="Копирайтинг / Рерайтинг"  >Копирайтинг / Рерайтинг</option>
     <option value="Корректура / Редактура"  >Корректура / Редактура</option>
     <option value="Креатив / Идеи"  >Креатив / Идеи</option>
     <option value="Менеджмент"  >Менеджмент</option>
     <option value="Наполнение / Редактирование контента сайта"  >Наполнение / Редактирование контента сайта</option>
     <option value="Оператор ПК / Диспетчер"  >Оператор ПК / Диспетчер</option>
     <option value="Оптимизация (SEO)"  >Оптимизация (SEO)</option>
     <option value="Переводы"  >Переводы</option>
     <option value="Презентации / Маркетинг-киты"  >Презентации / Маркетинг-киты</option>
     <option value="Программирование"  >Программирование</option>
     <option value="Разработка игр"  >Разработка игр</option>
     <option value="Разработка логотипа, фирменного стиля"  >Разработка логотипа, фирменного стиля</option>
     <option value="Работа, не требующая опыта и знаний"  >Работа, не требующая опыта и знаний</option>
     <option value="Разработка сайтов"  >Разработка сайтов</option>
     <option value="Реклама / Маркетинг / Контекст"  >Реклама / Маркетинг / Контекст</option>
     <option value="Рефераты / Дипломы / Курсовые"  >Рефераты / Дипломы / Курсовые</option>
     <option value="Системный администратор"  >Системный администратор</option>
     <option value="Сотрудничество"  >Сотрудничество</option>
     <option value="Социальные сети / Youtube"  >Социальные сети / Youtube</option>
     <option value="Тексты / Нейминг / Постинг"  >Тексты / Нейминг / Постинг</option>
     <option value="Флеш"  >Флеш</option>
     <option value="Фотография"  >Фотография</option>
     <option value="Юриспруденция"  >Юриспруденция</option>
     <option value="Другое"  >Другое</option>
</select>
</td>
</tr>
<tr>
<td width="170">
Вид предложения <font class="error">*</font>
</td>
<td width="*" align="left" style="padding-bottom:3px" colspan="2">
<SELECT required NAME="vid">
    <OPTION selected ></OPTION>
    <OPTION value="Удаленная работа"  >Удаленная работа (разовый заказ)</OPTION>
    <OPTION value="Удаленная работа (постоянное сотрудничество)"  >Удаленная работа (постоянное сотрудничество)</OPTION>
    <OPTION value="Постоянная работа"  >Постоянная работа (офис)</OPTION>
    <OPTION value="Смешанный (свободный) график"  >Смешанный (свободный) график</OPTION>
</SELECT>
</td>
</tr>

<tr>
<td width="170">
Оплата <font class="error">*</font>
</td>
<td width="*" align="left" style="padding-bottom:3px" colspan="2">
        <select required name="oplata"><option></option>
     <option value="1" >с банковской карты физлица</option>
     <option value="2" >желательно безнал</option>
     <option value="3" >только безнал</option>
     <option value="4" >безопасная сделка</option>
     <option value="5" >электронные деньги</option>
     <option value="6" >наличные</option>
</select>
</td>
</tr>

<tr>
<td width="170">Бюджет</td>
<td width="*" align="left">
<input type="text"  name="budget" size="26" maxlength="8" class="input-txt only_numbers" style="width:100%; max-width:264px;" value="">
<span id="BDUGET">
    <SELECT NAME="radio">
        <OPTION value="r">РУБ</OPTION>
        <OPTION value="d">USD</OPTION>
        <OPTION value="e">EUR</OPTION>
    </SELECT>
</span>
        </td>
        </tr>
        <tr>
            <td width="170">Заголовок предложения <font class="error">*</font></td>
            <td width="*" align="left">
                <input required type="text" style="width:650px" name="name_work" class="input-txt" size="40" maxlength="80" value="">
            </td>
        </tr>
        <tr>
            <td width="170">Название компании</td>
            <td width="*" align="left">
                <input type="text" style="width:100%; max-width:650px;" name="company" size="40" maxlength="34" class="input-txt" value="">
            </td>
        </tr>
    <tr>
        <td width="170" valign="top">
        Описание предложения <font class="error">*</font>
        </td>
        <td width="*" align="left">
            <?php $taskDescription = isset($_POST['task_description']) ? trim($_POST['task_description']) : ''; ?>
            <textarea name="mess" style="width:100%; max-width:650px; height:250px" rows="12" cols="35" class="form3_add input-textarea"><?php echo htmlspecialchars($taskDescription); ?></textarea>
        </td>
    </tr>

        <tr>
            <td width="170" valign="top">&nbsp;</td>
            <td width="*" align="left" height="100">
                <div class="g-recaptcha" data-sitekey="6Levwq0UAAAAAO6fmtEhxt2u-QVHNjfD_erf5gU8"></div>
            </td>
        </tr>

        <tr>
            <td class="size1">&nbsp;</td>
            <td width="*" align="left">
                <input type="hidden" name="login_reed" value="taknenado007">
                <input type="hidden" name="send" value="y">
                <input type="submit" value="Добавить предложение" class="btn" />
            </td>
        </tr>
        </table>
        </form>
        </span>
    </body>
    </html>