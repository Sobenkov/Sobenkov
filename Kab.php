<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Узнай погоду в своем городе</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

	 <header>

        <?php 

            $city = "Брянск"; // город. Можно и по-русски написать, например: Брянск
            $country = "RU"; // страна
            $mode = "json"; // в каком виде мы получим данные json или xml
            $units = "metric"; // Единицы измерения. metric или imperial
            $lang = "ru"; // язык
            $appID = "52a3cff675e4e6a5d39d0fbc77bd465e"; // Ваш APPID
              
            // формируем урл для запроса
            $url = "http://api.openweathermap.org/data/2.5/forecast?q=$city,$country&lang=$lang&units=$units&appid=$appID";
            $data = @file_get_contents($url);
            // если получили данные
            if($data){
                // декодируем полученные данные
                $dataJson = json_decode($data);
                // получаем только нужные данные
                $arrayDays = $dataJson->list;
                // выводим данные
            }

          echo "<h2>Погода для города " . $city . "</h2>";
          if($_COOKIE['user'] == !''):
        ?>
         <form action="city.php">
            <input type="text" name="city" placeholder="Название города" required>
            <input class="comm_btn" type="submit" value="Отправить">
         </form>
         <a href="index.php">На главную</a>
         <a href="ex.php">Выйти</a>
        <?php else: ?>
        <div class="header__reg">
          <a href="form_register.php">Регистрация</a>
          <a href="form_auth.php">Авторизация</a>
        </div>
        <?php endif;?>

    </header>

	<section>
			<?php
			    $host = 'localhost';  // Хост, у нас все локально
			    $user = 'root';    // Имя созданного вами пользователя
			    $pass = ''; // Установленный вами пароль пользователю
			    $db_name = 'zd12';   // Имя базы данных
			    $connect = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
			 ?>

			<h3>Модерация</h3>
			
		  <?php
			  if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
			    //удаляем строку из таблицы
			    $sql = mysqli_query($connect, "DELETE FROM `com` WHERE `id` = {$_GET['del_id']}"); //удаляем элемент по айди, который обозначается ниже
			  }
			?>
			<!-- таблица модерации -->
			<table class ="moder__table" border='1'>
			  <tr>
			    <td><b>ID</b></td>
			    <td><b>Пользователь</b></td>
			    <td><b>Комментарий</b></td>
			    <td><b>Удалить</b></td>
			  </tr>
			  <?php
			    $sql = mysqli_query($connect, "SELECT * FROM `com`"); //подключаемя к таблице "com" и берем из нее все
			    while ($mod = mysqli_fetch_array($sql)) {
			      echo '<tr>' .
			           "<td>{$mod['id']}</td>" . //выводим компоненты
			           "<td>{$mod['name']}</td>" .
			           "<td>{$mod['com_text']}</td>" .
			           "<td><a href='?del_id={$mod['id']}'>Удалить</a></td>" . //при нажатии обозначается айди и стартует действие выше на удаление
			           '</tr>';
			    }
			  ?>
				</table>
	</section>

</body>
</html>


