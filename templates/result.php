
<div class="row">
    <div class="col-md-6"> <h3>Как выглядит:</h3><?= $preview ?></div>       
    <div class="col-md-6">
        <h3>Код для вставки:</h3>
        <textarea id="foo"><?= $result ?></textarea>
        <button class="btn" data-clipboard-target="#foo">Скопировать</button>
    </div>
</div>
         