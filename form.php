
<br>
<form action="index.php" method="POST">
    
    <div class="col-sm-6 col-md-4 form-group">
        <input type="hidden" class="form-control ntSaveForms" id="back" name="back" placeholder="Задник" value="">
        Задний фон: <img src="1.png" id="b_image">
    </div>
    
    <div class="col-sm-6 col-md-4 form-group">
        <input type="hidden" class="form-control ntSaveForms" id="letter" name="front" placeholder="Буква" value="">
        Буква: <img src="1.png" id="f_image">
    </div>
    
    <div class="form-group col-md-4">
        <input type="text" class="form-control ntSaveForms" name="word" placeholder="Предложение">
    </div>
    
        <button type="reset" class="btn btn-danger ntSaveFormsSubmit" onclick="window.location.reload(); $.session.clear();" >Сбросить</button>
    <button type="submit" class="btn btn-primary ntSaveFormsSubmit">Нарисовать</button>
</form>
