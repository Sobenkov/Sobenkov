<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Узнай погоду в своем городе</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="reg">

<form  action="auth.php" method="post" name="form_register"> <!-- форма подключится к файлу auth после субмита -->
   <input maxlength="30" type="text" name="login" placeholder="Логин" required>
   <input type="password" name="password" placeholder="Пароль" required><br>
   <input type="submit" value="Авторизоваться">
</form>
</div>

</body>
</html>

