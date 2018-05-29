<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?
/*Подключение файла, содержащего вызываемые функции*/
require_once "functions.php";

/*Обработка события нажатия на кнопку входа*/
if(checkUser($_SESSION["login"], $_SESSION["password"]) == true) 
	echo '<script>window.location.href = "pages/mainpage.php";</script>';

if(isset($_POST["input"])) {
		$input_login = htmlspecialchars($_POST["input_login"]);
		$input_password = htmlspecialchars($_POST["input_password"]);
		if(checkUser($input_login, $input_password)) {
			session_start();
			$_SESSION["login"] = $input_login;
			$_SESSION["password"] = $input_password;
		} else echo "<script type = 'text/javascript'>alert('Неверный логин и/или пароль!');</script>";
		echo "<meta http-equiv = 'refresh' content='0; url=index.php' />";
	}
?>
<html>
<title>Система управления проектами</title>
<meta http-equiv="Content-Type" content="text/html; charset=window-1251">
<link rel="stylesheet" type="text/css" href="css/index.css">
<body>
<table width="100%">
  <tr>
	<th width="50%">
	<h2> Вход в систему</h2>
	<hr>
	<form action = "" method = "post">
		<p> Логин или e-mail </p>
		<input class = "input" type = "text" name = "input_login" /><br>
		<p> Пароль </p>
		<input class = "input" type = "password" placeholder = "" name = "input_password"><br><br>
		<input class = "button" type = "submit" name = "input" value = "Войти"><br><br>
		<a class="forgot" href="somepage.php">Забыли пароль?</a><br>
	</form>
	    <hr>
		Впервые на сайте? <a href="pages/registration.php">Зарегистрируйтесь</a>
	</th>
	<th width="50%"> <img src="images/resultados-proponto.png" alt="Управление проектами"> </th>
  </tr>
</table>
</body>
</html>