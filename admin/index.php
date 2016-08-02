<?include "checker.php";?>
<!DOCTYPE html>
<head>
	    <meta charset="utf-8">
		<title>Администрирование</title>
		
		<link rel="stylesheet" type="text/css" href="../styles/style.css" /> 
		<link rel="stylesheet" type="text/css" href="../styles/admin.css" /> 
		<link rel="stylesheet" type="text/css" href="../styles/forms.css" />
		<link rel="stylesheet" type="text/css" href="../styles/header.css" />
		<link rel="stylesheet" type="text/css" href="../styles/body.css" />
		<link rel="stylesheet" type="text/css" href="../styles/footer.css">
		<link rel="stylesheet" type="text/css" href="../styles/comments.css">
		<link rel="stylesheet" type="text/css" href="../styles/song.css">
		<link rel="stylesheet" type="text/css" href="../styles/component.css" />
		<link rel="icon" href="img/favicon.ico">

</head>
<body style="background:#ffffff">
<?php

if($logged){
	include"logged.php";
}else{
	include"login.php";
}

?>
</body>

<?

?>

