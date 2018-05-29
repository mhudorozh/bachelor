<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
require_once "../functions.php";

$id = getIDOnMail($_SESSION["login"]);
$user = getAllOnID($id);

$organization = getOrgatization($user["Organization"]);
$project_id = $_GET["project"];
//---�������� ������ �������---

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
		echo "<script type = 'text/javascript'>alert('�������� ������� ��������� �������');</script>";
		echo "<meta http-equiv = 'refresh' content='0; url=Proj_initiation.php?project=".$id_proj."' />";
	
	}
?>
<html>
<title>������� ���������� ���������</title>
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
			<tr onclick="createProject();"><td width="25%"><img src="../images/plus2.png"></td><td class="left">������� ������</td><td width="25%"></td></tr>
			<tr onclick="myTasks();" class="second" ><td><img src="../images/task2.png"></td><td class="left">��� ������</td><td></td></tr>
			<tr onclick="loadProjects();"><td><img src="../images/galka.png"></td><td class="left">��� �������</td><td><img id="img" src="../images/arrow_down.png"></td></tr>
			  <tr onclick="manager();" class="second" id="allproject1" style="display: none;"><td></td><td class="left">� ������������</td><td></td></tr>
			  <tr onclick="curator();" id="allproject2" style="display: none;" ><td></td><td class="left">� �������</td><td></td></tr>
			  <tr onclick="customer();" id="allproject3" class="second" style="display: none;"><td></td><td class="left">� ��������</td><td></td></tr>
			  <tr onclick="personal();" id="allproject4" style="display: none;"><td></td><td class="left">� ���������</td><td></td></tr>
			<tr onclick="myProfile();" class="second"><td><img src="../images/humans.png"></td><td class="left">�������</td><td></td></tr>
			<tr onclick="myFiles();"><td><img src="../images/myfiles.png"></td><td class="left">��� �����</td><td></td></tr>
			</table>
			<br><hr>
						<table class="listproject">
			<tr onclick="loadList();"><td width="25%"><img src="../images/lists.png"></td><td class="left">������</td><td width="25%"><img id="img_pr" src="../images/arrow_down.png"></td></tr>
			  <tr onclick="window.location.href='Proj_initiation.php?project=<? echo $project_id?>'; return false;" class="second" id="listproject1" style="display: none;"><td></td><td class="left">���������</td><td></td></tr>
			  <tr onclick="window.location.href='resources.php?project=<? echo $project_id?>'; return false;" id="listproject2" style="display: none;" ><td></td><td class="left">�������</td><td></td></tr>
			  <tr onclick="window.location.href='project_tasks.php?project=<? echo $project_id?>'; return false;" id="listproject3" class="second" style="display: none;"><td></td><td class="left">������</td><td></td></tr>
			  <tr onclick="window.location.href='risks.php?project=<? echo $project_id?>'; return false;" id="listproject4" style="display: none;"><td></td><td class="left">�����</td><td><img src="../images/arrow.png"></td></tr>
			  <tr onclick="window.location.href='employees.php?project=<? echo $project_id?>'; return false;" id="listproject5" class="second" style="display: none;"><td></td><td class="left">����������</td><td></td></tr>
			  <tr onclick="window.location.href='communications.php?project=<? echo $project_id?>'; return false;" id="listproject6" style="display: none;"><td></td><td class="left">������������</td><td></td></tr>
			  <tr onclick="window.location.href='files.php?project=<? echo $project_id?>'; return false;" id="listproject7" class="second" style="display: none;"><td></td><td class="left">�����</td><td></td></tr>
			  <tr onclick="window.location.href='reference_books.php?project=<? echo $project_id?>'; return false;" id="listproject8" style="display: none;"><td></td><td class="left">�����������</td><td></td></tr>
			</table>
		</td>
		<td valign="top">
	    <h1 style="margin-left: 27px; margin-top: 25px;">���������� �������</h1>
		<div class="tabs" style="width: 95%">
			<input type="radio" name="inset" value="" id="tab_1" checked>
			<label for="tab_1">����� ������</label>

			<input type="radio" name="inset" value="" id="tab_4">
			<label for="tab_4">��������� "�����������-�������"</label>

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
			<th>��������</th>
			<th>������� �������������</th>
			<th>�</th>
			<th>�������</th>
			<th>�������������</th>
			<th>����</th>
			<th>������</th>
		</tr>
		<tr class="nechet" id="row_1" valign="top" onclick= "document.getElementById('row_1').setAttribute('style', 'background: #F79757');
		document.getElementById('delete_risk').setAttribute('onclick', 'deleteElem(\'row_1\'); return false;')">
			<td id="r1td1">������ ����</td>
			<td id="r1td2">�����-�� �������</td>
			<td id="r1td3">0.1</td>
			<td id="r1td4">1</td>
			<td id="r1td5"><a href="#" name="riskpers1" id="riskpers1">������ ����</a></td>
			<td id="r1td6">�����-�� ����</td>
			<td id="r1td7">�����-�� ������</td>
		</tr>
		</table>
	</div>
    <div id="txt_4">
			<table class="base1" style="width: 100%; margin:0px;">
				<tr>
					<td><input type="text" id="ox" placeholder="�����������"/></td>
					<td><input type="text" id="oy" placeholder="�������" /></td>
					<td><input type="text" id="name" placeholder="������������"/></td>
				</tr>
				<tr>
					<td><button class="saveanddel" id="save" value="qwe"type="button" onclick="save_data(this.value, document.getElementById('name').value);">���������</button></td>
					<td colspan="2"><button class="saveanddel" id="delete" type="button" value="qwe" onclick="delete_data(this.value);">�������</button></td>
				</tr>
				<tr>
					<td colspan="3" id='td-txt_4'>
					<canvas id="setka" width="960" height="600"></canvas>
					<img style='position: absolute; top: 326px; left: 457px;' src='../images/risk.png' id='point1' class='draggable'></img>
					</td>
				</tr>	
			</table>
		</div>
	</div>
	<script src="../js/soccerrisk.js"></script>
	</form>
	</td>
</tr>
</table>
 <div id="zatemnenie">
      <div id="okno" style="height: 590px;">
	  <form action = "" method = "post">
        <table class="newcomm" style="margin-left: auto; margin-right: auto;">
			<tr>
				<td>��������</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>������� �������������</td>
				<td><textarea class="tio" name="riskname1" style="width: 250px;"></textarea></td>
			</tr>
			<tr>
				<td>�����������</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>�������</td>
				<td><input class = "input" type = "password" placeholder = "" name = "input_password" style="width: 250px;"></td>
			</tr>
			<tr>
				<td>�������������</td>
				<td>
				<div class="search" style="width: 250px;">
						  <input type="search" name="" placeholder="������ �����.." class="input" />
						  <input type="submit" name="" value="" class="submit" />
				</div>	
				</td>
			</tr>
			<tr>
				<td>����</td>
				<td><textarea class="tio" name="riskname1" style="width: 250px;"></textarea></td>
			</tr>
			<tr>
				<td>������</td>
				<td><textarea class="tio" name="riskname1" style="width: 250px;"></textarea></td>
			</tr>
		</table>
		<table style="margin-left: auto; margin-right: auto;">
		<tr>
			<td><input class = "add" type = "submit" style="margin: 0;"  value = "��������" /></td>
			<td><a href="#" class="knopka">������</a></td>
		</tr>
		</table>
		</form>
      </div>
    </div>
</body>
</html>
