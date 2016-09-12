<?php

Class Controller {

    private $model;
    private $error;

    function __construct() {
        $this->model = new Model();
        $this->error = false;
    }

    function start() {

        if(isset($_POST['submit'])) {
            $this->postRequest();
        }
        else {
            $this->showRequest();
        }
    }

    function postRequest() {

        $this->validate();

        if ($this->error === false) {
            $this->model->getData('all');
            $result = $this->model->getResult($_POST['back'], $_POST['front'], $_POST['word']);
            View::displayResults($result);
        }
        else {
            $this->showRequest();
        }
    }

    public function showRequest()
    {
        $category = empty($_GET['category']) ? "all" : $_GET['category'];
        $data = $this->model->getData($category);
        View::displayByCategory($data, $this->error, $category);
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
