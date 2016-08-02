<?
	include"init.php";
	$logged=$_SESSION['logged'];
	$textid = $_GET['page'];
	$songid = $_GET['song'];
	$letter = strtoupper(rawurldecode($_GET['letter']));
	$authorid = $_GET['authorid'];

	if($_SERVER['REQUEST_URI']{1} == "a"){
		if (empty($textid)){

			$textid = "add";
			$query="select * from pages where textid = '$textid'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$pagetext = $row[4];
		
		}else{
		
			$query="select * from pages where textid = '$textid'";	
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$pagetext = $row[4];
		}
	}else{
		if(empty($textid) && empty($songid)){
		
			$textid = "main";
			$query="select * from pages where textid = '$textid'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$pagetext = $row[4];
		
		}elseif(!empty($textid)){
		
			$query="select * from pages where textid = '$textid'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$pagetext = $row[4];

		}
		
	}
	
	
	if(empty($songid)){

		$issong = false;
		$pagename = $row[2]." ".$row[3];

	}else{

		$issong = true;
		$getsong = mysql_query("select * from songs where textid = '$songid'");
		$songrow = mysql_fetch_array($getsong, MYSQL_NUM);
		
		$getauthor = mysql_query("select author from authors where id = '$songrow[2]'");
		$author = mysql_fetch_array($getauthor, MYSQL_NUM);

		if(empty($author[0]) || empty($songrow[3])){

			$issong = false;
			$textid = "main";
			$query="select * from pages where textid = '$textid'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$pagetext = $row[4];
			$pagename = $row[2]." ".$row[3];

		}else{

			$pagename = $author[0]." - ".$songrow[3];
			$pagetext = "<pre>".$songrow[4]."</pre>";

		}
		
		


	}
	
	if($textid=="alphabet"){

		if(!empty($letter)){

			$pagename = "Исполнители на \"".$letter."\"";

		}elseif(!empty($authorid)){

			$getauthor = mysql_query("select * from authors where id = $authorid");
			$author = mysql_fetch_array($getauthor, MYSQL_NUM);

			$getsongs = mysql_query("select count(*) from songs where authorid = $authorid");
			$songs = mysql_fetch_array($getsongs);

			$pagename = "$author[1] ($songs[0]) - список песен";


			if(empty($songs[0])){
			
				$issong = false;
				$textid = "main";
				$query="select * from pages where textid = '$textid'";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result, MYSQL_NUM);
				$pagetext = $row[4];
				$pagename = $row[2]." ".$row[3];
			
			}
		}

	}




	
?>