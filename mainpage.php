<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
require_once "../functions.php";

$id = getIDOnMail($_SESSION["login"]);
$user = getAllOnID($id);
?>
<html>
<title>������� ���������� ���������</title>
<meta http-equiv="Content-Type" content="text/html; charset=window-1251">
<link rel="stylesheet" type="text/css" href="../css/mainpage.css">
<body>
<script src="../js/mainpage.js"></script>
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
			<tr onclick="myTasks();" class="second" ><td><img src="../images/task2.png"></td><td class="left">��� ������</td><td><img src="../images/arrow.png"></td></tr>
			<tr onclick="loadProjects();"><td><img src="../images/galka.png"></td><td class="left">��� �������</td><td><img id="img" src="../images/arrow_down.png"></td></tr>
			  <tr onclick="manager();" class="second" id="allproject1" style="display: none;"><td></td><td class="left">� ������������</td><td></td></tr>
			  <tr onclick="curator();" id="allproject2" style="display: none;" ><td></td><td class="left">� �������</td><td></td></tr>
			  <tr onclick="customer();" id="allproject3" class="second" style="display: none;"><td></td><td class="left">� ��������</td><td></td></tr>
			  <tr onclick="personal();" id="allproject4" style="display: none;"><td></td><td class="left">� ���������</td><td></td></tr>
			<tr onclick="myProfile();" class="second"><td><img src="../images/humans.png"></td><td class="left">�������</td><td></td></tr>
			<tr onclick="myFiles();"><td><img src="../images/myfiles.png"></td><td class="left">��� �����</td><td></td></tr>
			</table>
		</td>
		<td>
		<h1 style="margin-left: 78px; margin-top: -30px;"> ��� ������</h1>
		<table class="mytasks">
		<tr>
			<td>
			<form>
				<input type="date" name="dateofbirth" id="dateofbirth">
			</form>
			</td>
			<td>
			<form action="select1.php" method="post">
			<div class="styled-select slate">
				<select  name="project[]">
				<option selected value="���������">��� �������</option>
				<option value="���������">������ 1</option>
				<option value="�������� ����">������ 2</option>
				<option value="��������">...</option>
				<option value="����� ������">������ N</option>
				</select>
			</div>
			</form>
			</td>
			<td>
			<form action="select1.php" method="post">
			<div class="styled-select slate">
				<select name="sender[]">
				<option selected>��� �����������</option>
				<option value="���������">����������� 1</option>
				<option value="�������� ����">����������� 2</option>
				<option value="��������">...</option>
				<option value="����� ������">����������� N</option>
				</select>
			</div>
			</form>
			</td>
		</tr>
		<tr>
			<td colspan="3">
			<a href="#" class="knopka">�������� ������</a>
			</td>
		<tr>
		</table>
		<table class="table_task">
		<tr>
			<th>�</th>
			<th>�������� ������</th>
			<th>������</th>
			<th>�����������</th>
			<th>��������</th>
			<th>���������</th>
		</tr>
		<tr style="background: #EBEAF7">
			<td>1</td>
			<td>�������������� ���������</td>
			<td><a href="#">������ 1</a></td>
			<td>������������</td>
			<td>98%</td>
			<td><img src="../images/offcb.png"></td>
		</tr>
		<tr>
			<td>2</td>
			<td>�����-�� �������</td>
			<td><a href="#">������ 1</a></td>
			<td>������������</td>
			<td>15%</td>
			<td><img src="../images/offcb.png"></td>
		</tr>
		<tr style="background: #EBEAF7">
			<td>3</td>
			<td>��� �������</td>
			<td><a href="#">������ 2</a></td>
			<td>�</td>
			<td>50%</td>
			<td><img src="../images/offcb.png"></td>
		</tr>
		<tr>
			<td>4</td>
			<td>� ��������� �������</td>
			<td><a href="#">������ 3</a></td>
			<td>�</td>
			<td>100%</td>
			<td><img src="../images/oncb.png"></td>
		</tr>
		</table>
		<h2 style="margin-left: 78px; margin-top: 30px;"> ������� ��������:</h1>
		<ul style="margin-left: 68px;">
			<li><a href="#">������ 1</a> </li>
			<li><a href="#">������ 2</a> </li>
			<li><a href="#">������ 3</a> </li>
		</ul>
		</ul>
		</td>
	</tr>
</table>
</body>
</html>
