<?
	$getsongs = mysql_query("select * from songs");

	$i = 0;
	while($songs = mysql_fetch_array($getsongs)){
		$texid = trim($songs[1]);
		$songname = trim($songs[3]);
		$authorid = $songs[2];

		$getauthor = mysql_query("select * from authors where id = '$authorid'");
		$oldauthor = mysql_fetch_array($getauthor);
		$newauthor = trim($oldauthor[1]);

		if(mysql_query("update authors set author = '$newauthor'")){
			$i++;
			echo "$i) A: true";
		}else{
			$i++;
			echo "$i) A: <p>false</p>";
		}



		if(mysql_query("update songs set textid = '$textid' songname = '$songname'")){
			echo "S: true<br>";
		}else{
			echo "S: <p>false</p>";
		}

	}
?>