
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Узнай погоду в своем городе</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>


<div class="reg">

<form class="reg" action="reg.php" method="post" name="register"> <!-- форма подключится к файлу auth после субмита -->
   <input maxlength="30" type="text" name="login" placeholder="Логин" required>
   <input maxlength="30" type="text" name="email" placeholder="Почта" required>
   <input type="password" name="password" placeholder="Пароль" required><br>
   <input type="submit" value="Зарегистрироваться">
</form>
</div>

</body>
</html>



