<?php
session_start();
//Удаляем данные о логине из сессии
unset($_SESSION["login"]);
//Удаляем данные о пароле из сессии
unset($_SESSION["password"]);
//Возвращаемся на страницу авторизации
echo "<meta http-equiv = 'refresh' content='0; url=index.php' />";
?>