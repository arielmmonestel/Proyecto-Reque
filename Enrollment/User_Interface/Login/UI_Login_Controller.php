<?php

include("../../Business_Logic_Layer/LoginClass.php");

$LoginClass = new LoginClass();
$LoginClass->username = $_POST["username"];
$LoginClass->password = $_POST["password"];

$result = $LoginClass->userOk();
while ($a=mysql_fetch_assoc($result)){
	$user_id = $a['user_id'];
	$name = $a['name'];
	$lastname = $a['lastname'];
	$username = $a['username'];
	$password = $a['password'];
	$user_Type_id = $a['user_Type_id'] ;
}

if (isset($name)) {
	session_start();
	$_SESSION["user_id"] = $user_id;
	$_SESSION["name"] = $name;
	$_SESSION["lastname"] = $lastname;
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
	$_SESSION["user_Type_id"] = $user_Type_id;
	header("Location: ../Select_Enrollment/index.html");
}
else{
	echo "mal";
}

?>