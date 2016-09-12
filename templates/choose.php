<?php foreach ($data as $key => $value): ?>
    <?php $key = str_replace("_", "", $key); ?>
    <div class='emoj' id='<?= $value ?>' data-title='<?= $key ?>'>
    <img width = '25px' height = '25px' src=<?= $value ?>>
    </div>
<?php endforeach; ?>