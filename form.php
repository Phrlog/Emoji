<br>
<?php
if (isset($_POST['submit'])) {
    $alert = "";
    if ($_POST['back'] == "") {
        $alert.="Задайте смайлик фона.<br>";
    }
    if ($_POST['front'] == "") {
        $alert.="Задайте смайлик буквы.<br>";
    }
    if ($_POST['word'] == "") {
        $alert.="Задайте предложение.<br>";
    }
    if (preg_match("/[^a-zа-яё\s]/iu", $_POST['word'])) {
        $alert.="Предложение должно содержать только латиницу или кириллицу.<br>";
    }
    $alert == "" ? : print("<div class='alert alert-danger' role='alert'>$alert</div>");
}
?>
<form action="index.php" method="POST">

    <div class="col-sm-6 col-md-4 form-group">
        <input type="hidden" class="form-control" id="back" name="back" placeholder="Задник" value="">
        Задний фон: <img src="1.png" id="b_image">
    </div>

    <div class="col-sm-6 col-md-4 form-group">
        <input type="hidden" class="form-control" id="letter" name="front" placeholder="Буква" value="">
        Буква: <img src="1.png" id="f_image">
    </div>

    <div class="form-group col-md-4">
        <input type="text" class="form-control" name="word" placeholder="Предложение">
    </div>
    <button type="reset" class="btn btn-danger" onclick="window.location.href = document.location.href; $.session.clear();">Сбросить</button>
    <button type="submit" class="btn btn-primary" name="submit">Нарисовать</button>
</form>
