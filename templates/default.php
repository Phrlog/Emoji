<html>
    <head>
        <title>Emoji генератор</title>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Merriweather&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/jquery.session.js"></script>
        <script src="js/clipboard.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <?php if($error!=false){include 'error.php';} ?>
                       
            <?php include 'form.php'; ?>

            <ul class="nav nav-tabs">
                <?php include 'menu.php'; ?>
            </ul>

            <div>
                <?php include "$content"; ?>
            </div>
        </div>
        <script type="text/javascript" src="js/clicks.js"></script>
    </body> 
</html>



