<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
require_once "../functions.php";

$project_id = $_GET["project"];
$id = getIDOnMail($_SESSION["login"]);
$user = getAllOnID($id);

$organization = getOrgatization($user["Organization"]);

//---Создание нового проекта---

if(isset($_POST["create_project"])) {
		$Full_name = htmlspecialchars($_POST["Full_name"]);
		$Short_name = htmlspecialchars($_POST["Short_name"]);
		$DataStart = htmlspecialchars($_POST["DataStart"]);
		$DataEnd = htmlspecialchars($_POST["DataEnd"]);
		$InitiationReason = htmlspecialchars($_POST["InitiationReason"]);
		$Goal = htmlspecialchars($_POST["Goal"]);
		$Description = htmlspecialchars($_POST["Description"]);
		$Organization = $user["Organization"];
		$Manager = $user["id"];
		
		projectInitiation($Full_name, $Short_name, $DataStart, $DataEnd, $InitiationReason, $Goal, $Description, $Organization, $Manager);
		$id_proj = lastId();
		echo "<script type = 'text/javascript'>alert('Создание проекта завершено успешно');</script>";
		echo "<meta http-equiv = 'refresh' content='0; url=Proj_initiation.php?project=".$id_proj."' />";
	
	}
?>
<html>
<title>Система управления проектами</title>
<meta http-equiv="Content-Type" content="text/html; charset=window-1251">
<link rel="stylesheet" type="text/css" href="../css/initiation.css">
<body>
<script src="../js/initiation.js"></script>
<table class="header">
	<tr>
		<th width="50%"><img src="../images/message.png"></th>
		<th style="text-align: right;"><img src="../images/avatarwom.png"></th>
		<th width="15%"><h1><? echo $user["User_Name"].' '.$user["User_Surname"];?></h1></th>
		<th style="text-align: center;"><img onclick="window.location.href='../logout.php'" src="../images/logout.png"></th>
	</tr>
</table>
<table class="body">
	<tr>
		<td class="nav" valign="top">
			<table class="list">
			<tr onclick="createProject();"><td width="25%"><img src="../images/plus2.png"></td><td class="left">Создать проект</td><td width="25%"></td></tr>
			<tr onclick="myTasks();" class="second" ><td><img src="../images/task2.png"></td><td class="left">Мои задачи</td><td></td></tr>
			<tr onclick="loadProjects();"><td><img src="../images/galka.png"></td><td class="left">Все проекты</td><td><img id="img" src="../images/arrow_down.png"></td></tr>
			  <tr onclick="manager();" class="second" id="allproject1" style="display: none;"><td></td><td class="left">Я руководитель</td><td></td></tr>
			  <tr onclick="curator();" id="allproject2" style="display: none;" ><td></td><td class="left">Я куратор</td><td></td></tr>
			  <tr onclick="customer();" id="allproject3" class="second" style="display: none;"><td></td><td class="left">Я заказчик</td><td></td></tr>
			  <tr onclick="personal();" id="allproject4" style="display: none;"><td></td><td class="left">Я сотрудник</td><td></td></tr>
			<tr onclick="myProfile();" class="second"><td><img src="../images/humans.png"></td><td class="left">Профиль</td><td></td></tr>
			<tr onclick="myFiles();"><td><img src="../images/myfiles.png"></td><td class="left">Мои файлы</td><td></td></tr>
			</table>
			<br><hr>
			<table class="listproject">
			<tr onclick="loadList();"><td width="25%"><img src="../images/lists.png"></td><td class="left">Проект</td><td width="25%"><img id="img_pr" src="../images/arrow_down.png"></td></tr>
			  <tr onclick="window.location.href='Proj_initiation.php?project=<? echo $project_id; ?>'; return false;" class="second" id="listproject1" style="display: none;"><td></td><td class="left">Инициация</td><td></td></tr>
			  <tr onclick="window.location.href='resources.php?project=<? echo $project_id; ?>'; return false;" id="listproject2" style="display: none;" ><td></td><td class="left">Ресурсы</td><td></td></tr>
			  <tr onclick="window.location.href='project_tasks.php?project=<? echo $project_id; ?>'; return false;" id="listproject3" class="second" style="display: none;"><td></td><td class="left">Задачи</td><td></td></tr>
			  <tr onclick="window.location.href='risks.php?project=<? echo $project_id; ?>'; return false;" id="listproject4" style="display: none;"><td></td><td class="left">Риски</td><td></td></tr>
			  <tr onclick="window.location.href='employees.php?project=<? echo $project_id; ?>'; return false;" id="listproject5" class="second" style="display: none;"><td></td><td class="left">Сотрудники</td><td></td></tr>
			  <tr onclick="window.location.href='communications.php?project=<? echo $project_id; ?>'; return false;" id="listproject6" style="display: none;"><td></td><td class="left">Коммуникации</td><td></td></tr>
			  <tr onclick="window.location.href='files.php?project=<? echo $project_id; ?>'; return false;" id="listproject7" class="second" style="display: none;"><td></td><td class="left">Файлы</td><td></td></tr>
			  <tr onclick="window.location.href='reference_books.php?project=<? echo $project_id?>'; return false;" id="listproject8" style="display: none;"><td></td><td class="left">Справочники</td><td><img src="../images/arrow.png"></td></tr>
			</table>
		</td>
		<td valign="top">
	    <h1 style="margin-left: 50px;  margin-top: 25px;">Справочники</h1>
		<table style=" width: 15%; margin-top: 15px; margin-left: 60px; cursor:pointer;" >
			<tr onclick="showTable('tbl_measurement', 0);">
				<td><h2 style="color: #211993;"><u>Измерения</u></h2></td>
				<td valign="center"><img id="img_tbl_measurement" src="../images/refdown.png"></td>
			</tr>
		</table>
		<table class="ref" id="tbl_measurement" style="display: none;">
			<tr>
				<td colspan="2"><a href="#">Посмотреть все измерения</a></td>
			</tr>
			<tr>
				<td colspan="2"><h3>Новое измерение</h3></td>
			</tr>
			<tr>
				<td>Наименование</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Валюта</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Время</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "reference" type = "submit" style="margin: 0;" name = "create_project" value = "Сохранить изменения" /></td>
			</tr>
		</table>
		<table style="width: 20%; margin-top: 18px; margin-left: 60px; cursor:pointer;">
			<tr onclick="showTable('tbl_schedule', 1);">
				<td><h2 style="color: #211993;"><u>График работы</u></h2></td>
				<td valign="center"><img id="img_tbl_schedule" src="../images/refdown.png"></td>
			</tr>
		</table>
		<table class="ref" id="tbl_schedule" style="display: none;">
			<tr>
				<td colspan="2"><a href="#">Посмотреть все графики</a></td>
			</tr>
			<tr>
				<td colspan="2"><h3>Новый график</h3></td>
			</tr>
			<tr>
				<td>Наименование</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Валюта</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Время</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "reference" type = "submit" style="margin: 0;" name = "create_project" value = "Сохранить изменения" /></td>
			</tr>
		</table>
		<table style=" width: 34%; margin-top: 18px; margin-left: 60px; cursor:pointer;">
			<tr onclick="showTable('tbl_resources', 2);">
				<td><h2 style="color: #211993;"><u>Методы управления рисками</u></h2></td>
				<td valign="center"><img id="img_tbl_resources" src="../images/refdown.png"></td>
			</tr>
		</table>
		<table class="ref" id="tbl_resources" style="display: none;">
			<tr>
				<td colspan="2"><a href="#">Посмотреть методы управления рисками</a></td>
			</tr>
			<tr>
				<td colspan="2"><h3>Новый метод</h3></td>
			</tr>
			<tr>
				<td>Наименование</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Валюта</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Время</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "reference" type = "submit" style="margin: 0;" name = "create_project" value = "Сохранить изменения" /></td>
			</tr>
		</table>
		<table style=" width: 28%; margin-top: 18px; margin-left: 60px; cursor:pointer;">
			<tr onclick="showTable('tbl_communication', 3);">
				<td><h2 style="color: #211993;"><u>Методы коммуникации</u></h2></td>
				<td valign="center"><img id="img_tbl_communication" src="../images/refdown.png"></td>
			</tr>
		</table>
		<table class="ref" id="tbl_communication" style="display: none;">
			<tr>
				<td colspan="2"><a href="#">Посмотреть все методы коммуникаций</a></td>
			</tr>
			<tr>
				<td colspan="2"><h3>Новый метод коммуникации</h3></td>
			</tr>
			<tr>
				<td>Наименование</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Валюта</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Время</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class = "reference" type = "submit" style="margin: 0;" name = "create_project" value = "Сохранить изменения" /></td>
			</tr>
		</table>
	</form>
	</td>
</tr>
</table>
</body>
</html>
