<?php
    $login = filter_var(trim($_POST['login']), //берем данные из формы
    FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

    $password = md5($pass."ррррр3553"); //безопасность пароля

    $mysql = new mysqli('localhost','root','','zd12');
    //создаем переменную result и через SQL делаем запрос ко всему в таблице Users нашей БД
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = 
    '$login' AND `password` = '$password'"); //найдем пользователя в бд, который соответствует форме авторизации
    $user = $result->fetch_assoc(); //конвертируем для удобства в массив
    if(count($user) == 0) {
        echo "Пользователя не существует!"; //с помощью count массив перебрался и если введеных данных нет в массиве - ошибка
        exit(); //закрываем сессию
    } 
    //делаем куки, чтобы сохранить пользователя
    setcookie('user', $user['login'], time() + 3600*48, "/"); //куки будут жить 1 час*24 и действовать на всех страницах

    $mysql->close();

    header ('location: /'); //возврат на главную
?>