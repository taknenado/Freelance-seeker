<?php
$code = '<ul><li class="selected sel" style="">Архитектура / Интерьер</li><li style="">Мероприятия</li><li style="">Рекламная / Постановочная</li><li style="">Репортажная</li><li style="">Ретуширование / Коллажи</li><li style="">Фотомодели</li><li style="">Художественная / Арт</li></ul>';

preg_match_all('/<li[^>]*>(.*?)<\/li>/', $code, $matches);

$options = $matches[1];
$converted = implode(', ', array_map(function ($option) {
    return '"' . htmlspecialchars($option) . '"';
}, $options));

echo $converted;
?>