<?php

class View {

    static public $category =  [
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


    static function displayByCategory($data, $error, $active) {
        $content = "../templates/choose.php";
        include '../templates/default.php';
    }

    static function displayResults($results) {
        $content = "../templates/result.php";
        $preview = $results[0];
        $result = $results[1];
        include '../templates/default.php';
    }

}
