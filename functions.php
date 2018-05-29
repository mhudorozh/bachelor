<?php
@session_start();
$mysqli = false;
//Функция, выполняющая подключение к базе данных "course"
function connectDB() {
	global $mysqli;
	//Указываем необходимую БД и данные о пользователе на phpMyAdmin
	$mysqli = new mysqli("localhost", "root", "", "projectmanager");
	$mysqli->query("SET NAMES 'cp1251'");
	//$mysqli->query("SET NAMES 'utf8'");
}

//Функция, прерывающая подключение к базе данных
function closeDB() {
	global $mysqli;
	$mysqli->close();
}

function checkUser($login, $password) {
	if(($login == "") || ($password == "")) return false;
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `users` WHERE `Login` = '$login'");
	closeDB();
	$row = $result->fetch_assoc();
	$real_password = $row["Password"];
	if($real_password != $password) return false;
	else return true;
}

function regUser($login, $name, $mail, $password, $patronymic, $surname) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("INSERT INTO `users` (`User_Name`, `User_Surname`, `User_Patronymic`, `Login`, `Password`, `E-mail`, `Organization` ) VALUES ('$name', '$surname', '$patronymic', '$login', '$password', '$mail', 1)");
	closeDB();
}

function getIDOnMail($login) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `users` WHERE `Login` = '$login'");
	closeDB();
	$row = $result->fetch_assoc();
	return $row["id"];
}

function getAllOnID($id) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$id'");
	closeDB();
	return $result->fetch_assoc();
}

function getOrgatization($id) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `organizations` WHERE `id` = '$id'");
	closeDB();
	return $result->fetch_assoc();
}

function projectInitiation($Full_name, $Short_name, $DataStart, $DataEnd, $InitiationReason, $Goal, $Description, $Organization, $Manager) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("INSERT INTO `projects` (`Full_name`, `Short_name`, `DataStart`, `DataEnd`, `InitiationReason`, `Goal`, `Description`, `Organization`, `Manager`, `Status` ) VALUES ('$Full_name', '$Short_name', '$DataStart', '$DataEnd', '$InitiationReason', '$Goal', '$Description', '$Organization', '$Manager', 1)");
	closeDB();
}

function lastID() {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT max(id) FROM `projects`");
	closeDB();
	$row = $result->fetch_assoc();
	return $row["max(id)"];
}

function getMyProjects($id) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `organizations` WHERE `id` = '$id'");
	closeDB();
	return $result->fetch_assoc();
}

function getProjectById($id) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `projects` WHERE `id` = '$id'");
	closeDB();
	return $result->fetch_assoc();
}

function getProjectOnManager($id) {
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM `projects` WHERE `Manager` = '$id'");
	$res = array();
	while ($r = $result->fetch_assoc()) {
		$res[] = $r;
	}
	closeDB();
	return $res;
}