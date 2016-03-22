<html>
    <head>
        <title>Emoji генератор</title>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/clipboard.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- автоматическое выделение конечного кода для вставки и выбор смайлика по клику -->
<div class="container">
        <?php include 'form.php'; ?>

        <ul class="nav nav-tabs">
            <?php include 'category.php'; ?>
        </ul>
        
            <div>
                <?php
                include "emoji.php";

                $obj = new Emoji((!$_GET['category']) ? "all" : $_GET['category']);

                if (isset($_POST['back'])) {
                    $obj->draw($_POST['back'], $_POST['front'], $_POST['word']);
                } else {
                    $obj->show();
                }
                ?>
            </div>
        </div>
        <script type='text/javascript' src='js/ntsaveforms.js'></script>
        <script type="text/javascript" src="js/clicks.js"></script>
    </body>
</html>



