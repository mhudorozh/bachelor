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
	
/*
http://localhost/gantt/samples/10_layout/01_rightside_columns.html
http://localhost/gantt/samples/09_worktime/01_working_hours_per_day.html
http://localhost/gantt/samples/03_scales/02_month_days.html
http://localhost/gantt/samples/03_scales/04_days.html
http://localhost/gantt/samples/06_skins/04_meadow.html
http://localhost/gantt/samples/05_lightbox/11_datepicker_for_lightbox.html
http://localhost/gantt/samples/05_lightbox/07_time.html

*/
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
			<tr onclick="createProject();"><td width="25%"><img src="../images/plus2.png"></td><td class="left">Создать проект</td><td width="25%"><img src="../images/arrow.png"></td></tr>
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
			  <tr onclick="window.location.href='Proj_initiation.php?project=2'; return false;" class="second" id="listproject1" style="display: none;"><td></td><td class="left">Инициация</td><td></td></tr>
			  <tr onclick="curator();" id="listproject2" style="display: none;" ><td></td><td class="left">Ресурсы</td><td></td></tr>
			  <tr onclick="customer();" id="listproject3" class="second" style="display: none;"><td></td><td class="left">Задачи</td><td></td></tr>
			  <tr onclick="window.location.href='risks.php?project=2'; return false;" id="listproject4" style="display: none;"><td></td><td class="left">Риски</td><td></td></tr>
			  <tr onclick="personal();" id="listproject5" class="second" style="display: none;"><td></td><td class="left">Сотрудники</td><td></td></tr>
			  <tr onclick="personal();" id="listproject6" style="display: none;"><td></td><td class="left">Коммуникации</td><td></td></tr>
			  <tr onclick="personal();" id="listproject7" class="second" style="display: none;"><td></td><td class="left">Файлы</td><td></td></tr>
			  <tr onclick="personal();" id="listproject8" style="display: none;"><td></td><td class="left">Справочники</td><td></td></tr>
			</table>
		</td>
		<td>
	    <h1 style="margin-left: 78px; margin-top: 25px;"> Инициация проекта</h1>
		<div class="tabs">
			<input type="radio" name="inset" value="" id="tab_1" checked>
			<label for="tab_1">Общие данные</label>

			<input type="radio" name="inset" value="" id="tab_2">
			<label for="tab_2">Требования и допущения</label>

			<input type="radio" name="inset" value="" id="tab_3">
			<label for="tab_3">Критерии приемки</label>

			<input type="radio" name="inset" value="" id="tab_4">
			<label for="tab_4">Заинтересованные стороны</label>

		<div id="txt_1">
		<form action = "" method = "post">
			<table class="base">
				<tr>
					<td><b>Полное наименование*:</td>
					<td colspan="2"><input class = "input" type = "text" name = "Full_name" /></td>
				</tr>
				<tr>
					<td><b>Короткое наименование*:</td>
					<td colspan="2"><input class = "input" type = "text" name = "Short_name" /></td>
				</tr>
				<tr>
					<td><b>Дата начала*:</td>
					<td colspan="2">
						<input type="date" name="dataStart" />
					</td>
				</tr>
				<tr>
					<td><b>Дата окончания*:</td>
					<td colspan="2">
						<input type="date" name="dataEnd" />
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Основания для инициации*:</td>
					<td colspan="2"><textarea class="initiation" name = "InitiationReason"></textarea></td>
				</tr>
				<tr>
					<td valign="top"><b>Цель*:</td>
					<td colspan="2"><textarea class="prod_and_goal" name = "Goal" style="margin-bottom: 10px;"></textarea></td>
				</tr>
				<tr>
					<td valign="top"><b>Продукт проекта:</td>
					<td colspan="2" class="form">
						<input name="counter" style="display:none;" id="counter" type = "text" value="1"/>
						<a href="#" class="knopka_add" onclick="newInput(); return false;">Добавить продукт</a><br><br>
						<div id='delete_prod_1'>
						<input class = "input" name="product1" type = "text" id="product1" placeholder = "Продукт 1">
						<a href="#" class="knopka_delete" onclick="deleteElem('delete_prod_1', 'counter'); return false;"></a><br><br>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Описание*:</td>
					<td colspan="2"><textarea class="initiation" name = "Description"></textarea></td>
				</tr>
				<tr>
					<td><b>Организация*:</td>
					<td colspan="2"><? echo $organization["Full_name"];?></td>
				</tr>
				<tr>
					<td><b>Руководитель*:</td>
					<td><img src="../images/avatarwom.png"></td>
					<td><? echo $user["User_Name"].' '.$user["User_Patronymic"].' '.$user["User_Surname"];?></td>
				</tr>
				<tr>
					<td><b>Заказчик:</td>
					<td colspan="2">
						<div class="search">
						  <input type="search" name="" placeholder="Искать здесь.." class="input" />
						  <input type="submit" name="" value="" class="submit" />
						</div>					
					</td>
				</tr>
				<tr>
					<td><b>Куратор:</td>
					<td colspan="2">
						<div class="search">
						  <input type="search" name="" placeholder="Искать здесь.." class="input" />
						  <input type="submit" name="" value="" class="submit" />
						</div>					
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Финансовое обоснование:</td>
					<td colspan="2"><input type="file" class="input" style='100%;'></td>
					<td></td>
				</tr>
			</table>
	</div>
    <div id="txt_2" style="min-height: 380px;">
			<table class="base">
				<tr>
					<td valign="top"><b>Требования:</td>
					<td class="form2">
						<div class="form21">
						<input name="counter_treb_1" style="display:none;" id="counter_treb_1" type = "text" value="1"/>
						<a href="#" class="knopka_add" onclick="newTreb(1); return false;">Добавить</a><br><br>
						<div id='t1_p1_delete'>
						<textarea class="tio" name="t1_p1" id="t1_p1" placeholder = "Требование 1 к продукту 1"></textarea>
						<a href="#" class="knopka_delete" onclick="deleteElem('t1_p1_delete', 'counter_treb_1'); return false;"></a><br><br>
						</div>
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top"><b>Допущения:</td>
					<td class="form3">
					<input name="counterOgr" style="display:none;" id="counter" type = "text" value="1"/>
						<a href="#" class="knopka_add" onclick="newOgr(); return false;">Добавить</a><br><br>
						<div id='delete_ogr_1'>
						<textarea class="tio" name="ogr1" type = "text" id="ogr1" placeholder = "Допущение 1"></textarea>
						<a href="#" class="knopka_delete" onclick="deleteElem('delete_ogr_1', 'counterOgr'); return false;"></a><br><br>
						</div>
					</td>
				</tr>	
				</table>
    </div>
    <div id="txt_3" style="height: 380px;">
			<table class="base">
				<tr>
					<td valign="top"><b>Критерии приемки:</td>
					<td><textarea class="tio" style="height: 200px;"></textarea></td>
				</tr>
				<tr>
					<td valign="top"><b>Добавить файл:</td>
					<td colspan="2"><input type="file" class="input" style='width: 81%;'></td>
				</tr>
			</table>
    </div>
    <div id="txt_4">
			<table class="base1">
				<tr>
					<td><input type="text" id="ox" placeholder="Интерес"/></td>
					<td><input type="text" id="oy" placeholder="Влияние" /></td>
					<td><input type="text" id="name" placeholder="Имя"/></td>
				</tr>
				<tr>
					<td><button class="saveanddel" id="save" value="qwe" type="button" onclick="save_data(this.value, document.getElementById('name').value);">Сохранить</button></td>
					<td colspan="2"><button class="saveanddel" id="delete" type="button" value="qwe" onclick="delete_data(this.value);">Удалить</button></td>
				</tr>
				<tr>
					<td colspan="3">
					<canvas id="setka" width="850" height="600"></canvas>
					</td>
				</tr>	
			</table>
		</div>
	</div>
	<script src="../js/soccer.js"></script>
	<input class = "button" type = "submit" style="margin-top: 15px;" name = "create_project" value = "Создать проект" />
	</form>
	</td>
</tr>
</table>
</body>
</html>
