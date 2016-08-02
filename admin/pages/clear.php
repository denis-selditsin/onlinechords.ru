 <?
 	$getcountsongs = mysql_query("select count(*) from songs where textid = '' or authorid = '' or songname = '' or songtext = ''");
 	
 	$countsongs = mysql_fetch_array($getcountsongs);

 	if(mysql_query("delete from songs where textid = '' or authorid = '' or songname = '' or songtext = ''")){
 		echo "Удалено $countsongs[0] песен<br>";
 	}else{
 		echo mysql_error();
 	}

 	$getauthors = mysql_query("select * from authors");
 	$i = 0;
 	while($authors = mysql_fetch_array($getauthors)){
 	
		$getcountsongs = mysql_query("select count(*) from songs where authorid = '$authors[0]'");
		$countsongs = mysql_fetch_array($getcountsongs);
		if(empty($countsongs[0])){
			if(mysql_query("delete from authors where id = '$authors[0]'")){
				$i++;
				echo "$i) Автор удален <br>";
			}else{
				$i++;
				echo $i.") ".mysql_error();
			}
		}
 		
 	}
 	echo "Всего $i исполнителей";

 ?>