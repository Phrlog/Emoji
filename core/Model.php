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
    const LETTER_LENGTH = 12;
    const ROW_LENGTH = 8;

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
        $chars = $this->mbStringToArray(mb_strtolower($word, 'UTF-8')); 
        list($image, $image1, $code, $code1) = [$this->getImage($back), $this->getImage($paint), $this->getCode($back), $this->getCode($paint)];
        $file = fopen("../1.md", "r");
        $result = $preview = "";
        for ($w = 0; $w < sizeof($chars); $w++) { 
            $position = array_search($chars[$w], $this->symbols);
            fseek($file, $position * 99);
            for ($j = 0; $j < self::LETTER_LENGTH; $j++) { 
                $buffer = fgets($file);
                for ($i = 0; $i < self::ROW_LENGTH; $i++) {                   
                    $preview.= ($buffer[$i] == "0") ? $image : $image1;
                    $result.= ($buffer[$i] == "0") ? $code : $code1;
                }
                $preview.="<br>";
                $result.="\n";
            }
        }
        fclose($file);
        return array($preview, $result);
    }

    private function getCode($r) {
        $key = array_search($r, $this->data);
        return str_replace("_", "", $key);
    }

    private function getImage($r) {
        return "<img src={$r} width='20px'</img>";
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
