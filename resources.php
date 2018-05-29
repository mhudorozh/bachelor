<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
require_once "../functions.php";

$id = getIDOnMail($_SESSION["login"]);
$user = getAllOnID($id);

$organization = getOrgatization($user["Organization"]);
$project_id = $_GET["project"];
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
<style>
		.gantt_task_line.gantt_project{
			color:white;
		}

		.gantt_side_content{
			color:#333;
		}

		.summary-bar{
			font-weight: bold;
		}

		.gantt_resource_task .gantt_task_content{
			color:inherit;
		}

		.gantt_resource_task .gantt_task_progress{
			background-color:rgba(33,33,33,0.3);
		}

		.gantt_cell:nth-child(1) .gantt_tree_content{
			border-radius: 16px;
			width: 100%;
			height: 80%;
			margin: 5% 0;
			line-height: 230%;
		}
	</style>
<body>
<script src="../js/initiation.js"></script>
<script src="../codebase/dhtmlxgantt.js?v=20180227"></script>
<script src="../js/testdata.js?v=20180227"></script>
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
			  <tr onclick="window.location.href='Proj_initiation.php?project=<? echo $project_id?>'; return false;" class="second" id="listproject1" style="display: none;"><td></td><td class="left">Инициация</td><td></td></tr>
			  <tr onclick="window.location.href='resources.php?project=<? echo $project_id?>'; return false;" id="listproject2" style="display: none;" ><td></td><td class="left">Ресурсы</td><td><img src="../images/arrow.png"></td></tr>
			  <tr onclick="window.location.href='project_tasks.php?project=<? echo $project_id?>'; return false;" id="listproject3" class="second" style="display: none;"><td></td><td class="left">Задачи</td><td></td></tr>
			  <tr onclick="window.location.href='risks.php?project=<? echo $project_id?>'; return false;" id="listproject4" style="display: none;"><td></td><td class="left">Риски</td><td></td></tr>
			  <tr onclick="window.location.href='employees.php?project=<? echo $project_id?>'; return false;" id="listproject5" class="second" style="display: none;"><td></td><td class="left">Сотрудники</td><td></td></tr>
			  <tr onclick="window.location.href='communications.php?project=<? echo $project_id?>'; return false;" id="listproject6" style="display: none;"><td></td><td class="left">Коммуникации</td><td></td></tr>
			  <tr onclick="window.location.href='files.php?project=<? echo $project_id?>'; return false;" id="listproject7" class="second" style="display: none;"><td></td><td class="left">Файлы</td><td></td></tr>
			  <tr onclick="window.location.href='reference_books.php?project=<? echo $project_id?>'; return false;" id="listproject8" style="display: none;"><td></td><td class="left">Справочники</td><td></td></tr>
			</table>
		</td>
		<td valign="top">
	    <h1 style="margin-left: 27px; margin-top: 25px;">Ресурсы</h1>
		<div class="tabs" style="width: 95%">
			<input type="radio" name="inset" value="" id="tab_1" checked>
			<label for="tab_1">Общие данные</label>

			<input type="radio" name="inset" value="" id="tab_4">
			<label for="tab_4">Использование ресурсов</label>

		<div id="txt_1" style="min-height: 400px;">
		<form action = "" method = "post">
		<table width="16%" style="margin-bottom: 20px; margin-top: 10px; margin-left: 15px;">
		<tr>
			<td><a href="#zatemnenie" class="knopka_add_risk"></a></td>
			<td><a href="#zatemnenie" class="knopka_edit_risk"></a></td>
			<td><a href="#" id="delete_risk" class="knopka_delete" onclick="deleteElem('row_1'); return false;"></a></td>
		</tr>
		</table>
		<table class="table_task" id='table_risk' style="width: 100%; margin:0px;">
		<tr>
			<th>Название</th>
			<th>Количество</th>
			<th>Стоимость</th>
			<th>у.е.</th>
			<th>График работы</th>
		</tr>
		<tr class="nechet" id="row_1" valign="top" onclick= "document.getElementById('row_1').setAttribute('style', 'background: #F79757');
		document.getElementById('delete_risk').setAttribute('onclick', 'deleteElem(\'row_1\'); return false;')">
			<td id="r1td1">Ресурс №1</td>
			<td id="r1td2">3</td>
			<td id="r1td3">500</td>
			<td id="r1td4">р/штука</td>
			<td id="r1td5">без ограничений</td>
		</tr>
		</table>
	</div>
    <div id="txt_4" ></div>
	</div>
	</form>
	</td>
</tr>
</table>
 <div id="zatemnenie">
      <div id="okno" style="height: 280px;">
	  <form action = "" method = "post">
        <table class="newcomm" style="margin-left: auto; margin-right: auto;">
			<tr>
				<td>Название</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Количество</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>Стоимость</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>у.е.</td>
				<td>
				<div class="styled-select slate" style="width: 250px;">
					<select name="sender[]">
					<option selected>руб/час</option>
					<option value="1">руб/штука</option>
					<option value="2">руб/день</option>
					</select>
				</div>
				</td>
			</tr>
			<tr>
				<td>График работы</td>
				<td>
				<div class="styled-select slate" style="width: 250px;">
					<select name="sender[]">
					<option selected>Не выбрано</option>
					<option value="1">5/2</option>
					<option value="2">2/2</option>
					</select>
				</div>				
				</td>
			</tr>
		</table>
		<table style="margin-left: auto; margin-right: auto;">
		<tr>
			<td><input class = "add" type = "submit" style="margin: 0;"  value = "Добавить" /></td>
			<td><a href="#" class="knopka">Отмена</a></td>
		</tr>
		</table>
		</form>
      </div>
    </div>
<div id="gantt_here" style='width:80%; height:600px;'></div>
<script>
	gantt.serverList("staff", [
		{key: 1, label: "John", backgroundColor:"#03A9F4", textColor:"#FFF"},
		{key: 2, label: "Mike", backgroundColor:"#f57730", textColor:"#FFF"},
		{key: 3, label: "Anna", backgroundColor:"#e157de", textColor:"#FFF"},
		{key: 4, label: "Bill", backgroundColor:"#78909C", textColor:"#FFF"},
		{key: 7, label: "Floe", backgroundColor:"#8D6E63", textColor:"#FFF"}
	]);

	// end test data
	gantt.config.grid_width = 420;
	gantt.config.grid_resize = true;
	gantt.config.open_tree_initially = true;

	var labels = gantt.locale.labels;
	
	labels.column_owner = labels.section_owner = "Ресурс";

	function byId(list, id) {
		for (var i = 0; i < list.length; i++) {
			if (list[i].key == id)
				return list[i].label || "";
		}
		return "";
	}

	gantt.config.columns = [
		{name: "owner", width: 80, align: "center", template: function (item) {
				return byId(gantt.serverList('staff'), item.owner_id)}},
		{name: "text", label: "Задача", tree: true, width: '*'},
		{name: "add", width: 40}
	];

	gantt.config.lightbox.sections = [
		{name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
		
		{name: "owner", height: 22, map_to: "owner_id", type: "select", options: gantt.serverList("staff")},
		{name: "time", type: "duration", map_to: "auto"}
	];

	gantt.templates.rightside_text = function(start, end, task){
		return byId(gantt.serverList('staff'), task.owner_id);
	};

	gantt.templates.grid_row_class =
		gantt.templates.task_row_class =
			gantt.templates.task_class = function (start, end, task) {
		var css = [];
		if (task.$virtual || task.type == gantt.config.types.project)
			css.push("summary-bar");

		if(task.owner_id){
			css.push("gantt_resource_task gantt_resource_" + task.owner_id);
		}

		return css.join(" ");
	};

	gantt.attachEvent("onLoadEnd", function(){
		var styleId = "dynamicGanttStyles";
		var element = document.getElementById(styleId);
		if(!element){
			element = document.createElement("style");
			element.id = styleId;
			document.querySelector("head").appendChild(element);
		}
		var html = [];
		var resources = gantt.serverList("staff");

		resources.forEach(function(r){
			html.push(".gantt_task_line.gantt_resource_" + r.key + "{" +
				"background-color:"+r.backgroundColor+"; " +
				"color:"+r.textColor+";" +
			"}");
			html.push(".gantt_row.gantt_resource_" + r.key + " .gantt_cell:nth-child(1) .gantt_tree_content{" +
				"background-color:"+r.backgroundColor+"; " +
				"color:"+r.textColor+";" +
				"}");
		});
		element.innerHTML = html.join("");
	});

	gantt.init("gantt_here");
	gantt.load("resource_project_2.json");


</script>
</body>
</html>
