<?php
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);

    $password = md5($pass."ррррр3553"); //безопасность пароля

    $mysql = new mysqli('localhost','root','','zd12');

    $mysql->query("INSERT INTO `users` (`login`, `password`, `email`)
    VALUES('$login', '$password', '$email')");

    $mysql->close();

    header ('location: /');
?>