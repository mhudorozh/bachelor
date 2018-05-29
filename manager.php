<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
require_once "../functions.php";

$id = getIDOnMail($_SESSION["login"]);
$user = getAllOnID($id);

$projectManager = getProjectOnManager($id);
$n = count($projectManager);
$table = '';
		
for ($i = 0; $i < $n; $i++) {
	if ( ($i + 1) % 2 != 0 ) {
		$table .= '<tr class="tr_bkg" onclick="window.location.href=\'Proj_initiation.php?project='.$projectManager[$i]['id'].'\';">
			<td>'.($i + 1).'</td>
			<td width="50%">'.$projectManager[$i]['Full_name'].'</td>
			<td>'.$projectManager[$i]['DataStart'].'</td>
			<td>'.$projectManager[$i]['DataEnd'].'</td>
			<td>0%</td>
		</tr>';
	}
	else {
		$table .= '<tr onclick="window.location.href=\'Proj_initiation.php?project='.$projectManager[$i]['id'].'\';">
			<td>'.($i + 1).'</td>
			<td width="50%">'.$projectManager[$i]['Full_name'].'</td>
			<td>'.$projectManager[$i]['DataStart'].'</td>
			<td>'.$projectManager[$i]['DataEnd'].'</td>
			<td>0%</td>
		</tr>';
	}
}
?>

<html>
<title>Система управления проектами</title>
<meta http-equiv="Content-Type" content="text/html; charset=window-1251">
<link rel="stylesheet" type="text/css" href="../css/manager.css">
<body>
<script src="../js/mainpage.js"></script>
<table class="header">
	<tr>
		<th width="50%"><img src="../images/message.png"></th>
		<th style="text-align: right;"><img src="../images/avatarwom.png"></th>
		<th width="15%"><h1><? echo $user["User_Name"].' '.$user["User_Surname"];?></h1></th>
		<th style="text-align: center;"><button onclick="window.location.href='../logout.php'">Выход</button></th>
	</tr>
</table>
<table class="body">
	<tr>
		<td class="nav" valign="top">
			<table class="list">
			<tr onclick="createProject();"><td width="25%"><img src="../images/plus2.png"></td><td class="left">Создать проект</td><td width="25%"></td></tr>
			<tr onclick="myTasks();" class="second" ><td><img src="../images/task2.png"></td><td class="left">Мои задачи</td><td><img src="../images/arrow.png"></td></tr>
			<tr onclick="loadProjects();"><td><img src="../images/galka.png"></td><td class="left">Все проекты</td><td><img id="img" src="../images/arrow_down.png"></td></tr>
			  <tr onclick="manager();" class="second" id="allproject1" style="display: none;"><td></td><td class="left">Я руководитель</td><td></td></tr>
			  <tr onclick="curator();" id="allproject2" style="display: none;" ><td></td><td class="left">Я куратор</td><td></td></tr>
			  <tr onclick="customer();" id="allproject3" class="second" style="display: none;"><td></td><td class="left">Я заказчик</td><td></td></tr>
			  <tr onclick="personal();" id="allproject4" style="display: none;"><td></td><td class="left">Я сотрудник</td><td></td></tr>
			<tr onclick="myProfile();" class="second"><td><img src="../images/humans.png"></td><td class="left">Профиль</td><td></td></tr>
			<tr onclick="myFiles();"><td><img src="../images/myfiles.png"></td><td class="left">Мои файлы</td><td></td></tr>
			</table>
		</td>
		<td valign="top">
		<h1 style="margin-left: 78px; margin-top: 25px;"> Все проекты</h1>
		<h2 style="margin-left: 78px;"> Я руководитель</h2>
		<table class="mytasks" width="30%">
		<tr>
			<td> c:
			</td>
			<td>
			<form>
				<input type="date" name="dateofbirth" id="dateofbirth">
			</form>
			</td>
			<td> по:
			</td>
			<td>
			<form>
				<input type="date" name="dateofbirth" id="dateofbirth">
			</form>
			</td>			
		</tr>
		</table>
		<table class="table_task">
		<tr>
			<th>№</th>
			<th>Название поекта</th>
			<th>Дата начала</th>
			<th>Дата окончания</th>
			<th>Прогресс</th>
		</tr>
		<?echo $table;?>
		</table>
		</td>
	</tr>
</table>
</body>
</html>
