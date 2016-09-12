<?php foreach (View::$category as $key => $value):?>
    <?php if (strcasecmp(mb_substr($key, 10, mb_strlen($key, 'utf-8'), 'utf-8'), $active ) == 0): ?>
        <li role="presentation" class = "active"><a href="<?= $key ?>"><?= $value ?></a></li>
    <?php else: ?>
        <li role="presentation"><a href="<?= $key ?>"><?= $value ?></a></li>
    <?php endif;?>
<?php endforeach; ?>
