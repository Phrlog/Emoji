<?php

class Emoji {

    public $images;

    function __construct($category) {
        include'db.php';
        if ($category == "all") {
            $this->images = $link->query('SELECT code, image FROM main')->fetchAll(PDO::FETCH_KEY_PAIR);
        } else {
            $stm = $link->prepare('SELECT code, image FROM main WHERE category = ?');
            $stm->execute(array($category));
            $this->images = $stm->fetchAll(PDO::FETCH_KEY_PAIR);
        }
    }

    public function show() {
        foreach ($this->images as $key => $value) {
            echo "<div class='emoj' id='$value'>";          
            echo "<img width = '25px' height = '25px' src={$value}>";
            echo '</div>';
        }
    }

    private function getImage($r) {
        foreach ($this->images as $key => $value) {
            $key = preg_replace("/[^0-9]/", '', $key);
            if (strcasecmp($value, $r) == 0) {
                return "<img src={$value} width='20px' </img>";
            }
        }
    }

    //получаем код смайлика по номеру
    private function getCode($r) {
        foreach ($this->images as $key => $value) {
            $key = preg_replace("/[^0-9]/", '', $key);
            if (strcasecmp($value, $r) == 0) {
                return "&amp;#$key;";
            }
        }
    }

    //рисуем предложение смайликами
    public function draw($back, $paint, $word) {
        $word = mb_strtolower($word, 'UTF-8');
        $chars = $this->mbStringToArray($word);
        $image = $this->getImage($back);
        $image1 = $this->getImage($paint);
        $code = $this->getCode($back);
        $code1 = $this->getCode($paint);
        $file = fopen("1.md", "r");
        $result = "";
        $codes = "";
        $alphabet = ["а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я", " "];
        for ($w = 0; $w < sizeof($chars); $w++) {
            for ($i = 0; $i < 34; $i++) {
                if ($alphabet[$i] == $chars[$w]) {
                    fseek($file, $i * 99);
                }
            }
            for ($j = 0; $j < 12; $j++) {
                $buffer = fgets($file);
                for ($i = 0; $i < 8; $i++) {
                    if (strcasecmp($buffer[$i], "0") == 0) {
                        $result.=$image;
                        $codes.=$code;
                    } else if (strcasecmp($buffer[$i], "1") == 0) {
                        $result.=$image1;
                        $codes.=$code1;
                    }
                }
                $result.="<br>";
                $codes.="\n";
            }
        }
        echo "<div class='row'>";
        echo "<div class='col-md-6'><h3>Как выглядит:</h3>" . $result . "</div>";
        echo "<div class='col-md-6'><h3>Код для вставки:</h3><textarea id='foo'>" . $codes . "</textarea><button class='btn' data-clipboard-target='#foo'>Скопировать</button></div>";
        echo "</div>";
        
        fclose($file);
    }

    private function mbStringToArray($string) {
        $strlen = mb_strlen($string);
        while ($strlen) {
            $array[] = mb_substr($string, 0, 1, "UTF-8");
            $string = mb_substr($string, 1, $strlen, "UTF-8");
            $strlen = mb_strlen($string);
        }
        return $array;
    }

}

