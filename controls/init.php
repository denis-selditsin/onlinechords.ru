<?php
$uagent=$_SERVER['HTTP_USER_AGENT'];
 
$pagename; //Тайтл
$pagetext; //Основной контент

$host="localhost";
$user="u0205611_default";
$password="10zC_Pjn";
$db="u0205611_default";

$connection = mysql_connect($host, $user, $password) or die("MySQL сервер недоступен! ".mysql_error());
mysql_select_db($db) or die("Нет соединения с БД ".mysql_error());

mysql_query("SET NAMES 'utf-8_general_ci'");


?>
