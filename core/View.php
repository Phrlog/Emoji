<?php

class View {

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
