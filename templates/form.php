<br>
<form action="index.php" method="POST">
    <div class="row">

        <div class="col-sm-2 col-md-2 form-group">
            <input type="hidden" class="form-control" id="back" name="back" placeholder="Задник" value="">
            Задний фон: <img src="images/1.png" id="b_image">    
        </div>

        <div class="col-sm-1 col-md-1 form-group">
            <img src="images/arrow.png" width="32px" id="arrow" onclick="window.location.href = document.location.href;">
        </div>
        <div class="col-sm-2 col-md-2 form-group">
            <input type="hidden" class="form-control" id="letter" name="front" placeholder="Буква" value="">
            Буква: <img src="images/1.png" id="f_image">
        </div>

        <div class="col-sm-4 col-md-4 form-group">
            <input type="text" class="form-control" id="word" name="word" placeholder="Предложение">
        </div>
        <div class="col-sm-3 col-md-3 form-group">
            <button type="reset" class="btn btn-danger " onclick="window.location.href = document.location.href; $.session.clear();">Сбросить</button>
            <button type="submit" class="btn btn-primary" name="submit">Нарисовать</button>
        </div>
    </div>
</form>
