<div class="top">Новое</div>
	<div class="content" id="popular">
	
		<?
			$getsongs = mysql_query("select * from songs order by id DESC limit 5");
			while($songs = mysql_fetch_array($getsongs, MYSQL_NUM)){
					
				$getauthor = mysql_query("select author from authors where id = $songs[2]");
				$author = mysql_fetch_array($getauthor, MYSQL_NUM);
				echo"<a href='https://onlinechords.ru/?song=$songs[1]'>$author[0] - $songs[3]</a>";
					
			}

		?>

	</div>