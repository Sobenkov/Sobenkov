<?php
  /* Принимаем данные из формы */
  $page_id = $_POST["page_id"]; //уникальный идентификатор страницы
  $name = $_POST['name']; //имя пользователя, берется из куки
  $com_text = $_POST["com_text"]; //текст комментария
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $com_text = htmlspecialchars($com_text);// Преобразуем спецсимволы в HTML-сущности
  $mysqli = new mysqli("localhost", "root", "", "zd12");// Подключается к базе данных
  $mysqli->query("INSERT INTO `com` (`name`, `page_id`, `com_text`) VALUES ('$name', '$page_id', '$com_text')");// Добавляем комментарий в таблицу
  header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
?>


