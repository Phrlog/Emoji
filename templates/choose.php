<?php

foreach ($data as $key => $value) {
    $key = str_replace("_", "", $key);
    echo "<div class='emoj' id='$value' data-title='$key'>";
    echo "<img width = '25px' height = '25px' src={$value}>";
    echo '</div>';
}

