<?php
session_start();
include "../controls/control.php";
include "../controls/init.php";

if(!empty($_POST['username']) && !empty($_POST['password'])){
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];

if(($username == 'admin' && $password == 'gtavic')||($username == 'alina' && $password == '11061106')){
	$logged = true;
	$_SESSION['logged'] = $logged;
}else{
	$logged = false;
	if(!empty($username)){
		$error = "*Неверный логин или пароль.";

	}
}	
?>