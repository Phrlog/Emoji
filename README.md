# Emoji
Пишем слова и предложения смайликами Emoji. Получаем код, который можно использовать ВК


# Настройка

## 1
Создайте в директории проекта файл db.php и добавьте в него следующее:<br>
`<?php`<br>
`$dbhost = "localhost"; //или имя хоста, если БД не на локальном сервере`<br>
`$dbname = "name"; //имя вашей БД`<br>
`$dbusername = "root"; //ваш логин`<br>
`$dbpassword = "root"; //ваш пароль`<br>
`$link = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);`<br>

## 2
[Скачайте](https://drive.google.com/open?id=0B0PO4GTmDRlqSzZJclVyUG9razg) дамп базы данных и импортируйте его в свою БД

