<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?
/*Подключение файла, содержащего вызываемые функции*/
require_once "../functions.php";

/*Обработка события нажатия на кнопку зарегистрироваться*/	
if(isset($_POST["reg"])) {
		$mail = htmlspecialchars($_POST["mail"]);
		$login = htmlspecialchars($_POST["login"]);
		$name = htmlspecialchars($_POST["name"]);
		$patronymic = htmlspecialchars($_POST["patronymic"]);
		$surname = htmlspecialchars($_POST["surname"]);
		$password = htmlspecialchars($_POST["password"]);
		$re_password = htmlspecialchars($_POST["re_password"]);
		
		regUser($login, $name, $mail, $password, $patronymic, $surname);
		echo "<script type = 'text/javascript'>alert('Регистрация завершена успешно');</script>";
		$_SESSION["login"] = $login;
		$_SESSION["password"] = $password;
		echo "<meta http-equiv = 'refresh' content='0; url=mainpage.php' />";
	}
?>
<html>
<title>Система управления проектами</title>
<meta http-equiv="Content-Type" content="text/html; charset=window-1251">
<link rel="stylesheet" type="text/css" href="../css/registration.css">
<body>
  <div>
	<h1> Создать аккаунт</h1>
	<hr><br>
	<form action = "" method = "post">
		<input class = "input" placeholder = "Фамилия" type = "text" name = "auth_mail"><br><br>
		<input class = "input" placeholder = "Имя" type = "text" name = "auth_mail"><br><br>
		<input class = "input" placeholder = "Отчество" type = "text" name = "auth_mail"><br><br>
		<input class = "input" placeholder = "Логин" type = "text" name = "auth_mail"><br><br>
		<input class = "input" placeholder = "Электронная почта" type = "text" name = "auth_mail"><br><br>
		<input class = "input" placeholder = "Пароль" type = "password" placeholder = "" name = "auth_password"><br><br>
		<input class = "input" placeholder = "Повторите пароль" type = "password" placeholder = "" name = "auth_password"><br><br>
		<input class = "button" type = "submit" name = "auth" value = "Зарегистрироваться и войти"><br><br>
	</form>
  </div>
</body>
</html>