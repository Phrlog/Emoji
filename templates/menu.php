<?php
$category = [
    "?category=all" => "Показать всё",
    "?category=emotions" => "Эмоции",
    "?category=love" => "Любовь",
    "?category=gesture" => "Жесты",
    "?category=weather" => "Погода",
    "?category=food" => "Еда",
    "?category=holiday" => "Праздники",
    "?category=animals" => "Животные",
    "?category=symbol" => "Символы",
    "?category=sport" => "Спорт",
    "?category=plants" => "Растения",
    "?category=technology" => "Техника",
    "?category=building" => "Здания",
    "?category=games" => "Игры",
    "?category=music" => "Музыка",
    "?category=transport" => "Транспорт",
    "?category=office" => "Офис",
    "?category=space" => "Космос",
    "?category=clothes" => "Одежда",
    "?category=paints" => "Рисунки",
    "?category=humans" => "Люди",
    "?category=zodiac" => "Знаки зодиака",
    "?category=arrows" => "Стрелки",
    "?category=flags" => "Флаги",
    "?category=numeric" => "Числа"];

foreach ($category as $key => $value) {
    if (strcasecmp(mb_substr($key, 10, mb_strlen($key, 'utf-8'), 'utf-8'), $active ) == 0) {
        echo '<li role="presentation" class = "active"><a href="' . $key . '">' . $value . '</a></li>';
    } else {
        echo '<li role="presentation"><a href="' . $key . '">' . $value . '</a></li>';
    }
}
