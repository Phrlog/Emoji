<?php

Class Controller {

    public $error;
    private $result;
    public $data;
    public $category;

    function __construct() {

        $this->error = false;
        $this->result = false;
        $this->data = false;
    }

    function processData() {

        $this->userRequest();

        if ($this->result) {
            View::displayResults($this->result);
        } elseif ($this->data) {
            View::displayByCategory($this->data, $this->error, $this->category);
        }
    }

    function userRequest() {

        $model = new Model();
        $this->category = !$_GET['category'] ? "all" : $_GET['category'];
        $model->getData($this->category);
        $this->data = $model->data;
        // данные отправлены
        if (isset($_POST['submit'])) {
            $this->validate();
            if ($this->error === false) {
                $this->result = $model->getResult($_POST['back'], $_POST['front'], $_POST['word']);
            }
        }
    }

    function validate() {
        if ($_POST['back'] == "") {
            $this->error.="Задайте смайлик фона.<br>";
        }
        if ($_POST['front'] == "") {
            $this->error.="Задайте смайлик буквы.<br>";
        }
        if ($_POST['word'] == "") {
            $this->error.="Задайте предложение.<br>";
        }
        if (preg_match("/[^a-zа-яё\s]/iu", $_POST['word'])) {
            $this->error.="Предложение должно содержать только латиницу или кириллицу.<br>";
        }
    }

}
