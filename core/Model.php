<?php

class Model {

    public $data;
    private $connection;
    private $symbols = [
        "а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н",
        "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я",
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
        "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", " "
    ];

    function __construct() {
        require_once '../templates/db_settings.php';
        $this->data = false;
        $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    }

    public function getData($category) {

        if ($category == "all") {
            $this->data = $this->connection->query('SELECT code, image FROM main')->fetchAll(PDO::FETCH_KEY_PAIR);
        } else {
            $stm = $this->connection->prepare('SELECT code, image FROM main WHERE category = ?');
            $stm->execute(array($category));
            $this->data = $stm->fetchAll(PDO::FETCH_KEY_PAIR);
        }
    }

    public function getResult($back, $paint, $word) {
        $word = mb_strtolower($word, 'UTF-8');
        $chars = $this->mbStringToArray($word);
        $image = $this->getImage($back);
        $image1 = $this->getImage($paint);
        $code = $this->getCode($back);
        $code1 = $this->getCode($paint);
        $file = fopen("../1.md", "r");
        $preview = "";
        $result = "";
        for ($w = 0; $w < sizeof($chars); $w++) { //перебираем все символы
            for ($i = 0; $i < 61; $i++) {
                if ($this->symbols[$i] == $chars[$w]) { //находим нужную букву
                    fseek($file, $i * 99); //перемещаемся по текстовому файлу на нужную позицию буквы
                }
            }
            for ($j = 0; $j < 12; $j++) { // в букве 12 строк
                $buffer = fgets($file);
                for ($i = 0; $i < 8; $i++) { //в каждой строке 8 символов
                    if (strcasecmp($buffer[$i], "0") == 0) {
                        $preview.=$image;
                        $result.=$code;
                    } else if (strcasecmp($buffer[$i], "1") == 0) {
                        $preview.=$image1;
                        $result.=$code1;
                    }
                }
                $preview.="<br>";
                $result.="\n";
            }
        }
        fclose($file);
        return array($preview, $result);
    }

    private function getCode($r) {
        foreach ($this->data as $key => $value) {
            if (strcasecmp($value, $r) == 0) {
                return str_replace("_", "", $key);
            }
        }
    }

    private function getImage($r) {
        foreach ($this->data as $value) {
            if (strcasecmp($value, $r) == 0) {
                return "<img src={$value} width='20px'</img>";
            }
        }
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
