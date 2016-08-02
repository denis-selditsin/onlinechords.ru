

<div class='boxer inmain' style="float:left;">
	<div class='box-row' id='headline'>
		<div class='box'>Последние исполнители</div>
	</div>

<?
	$getauthors = mysql_query("select * from authors order by id desc limit 0,10");
	$i = 1;
	while($authors = mysql_fetch_array($getauthors, MYSQL_NUM)){

		echo "<div class='box-row bodyline".($i % 2)."'>
				<div class='box'><a href='/?page=alphabet&authorid=$authors[0]' class='authorlink'> $authors[1]</a></div>
			</div>";
		$i++;
		

	}
?>
</div>



<div class='boxer inmain'>
	<div class='box-row' id='headline'>
		<div class='box'>Последние добавленные песни</div>
	</div>

<?
	$getsongs = mysql_query("select * from songs order by id desc limit 0,10");
	$i = 1;
	while($song = mysql_fetch_array($getsongs, MYSQL_NUM)){

		$getauthor = mysql_query("select * from authors where id = $song[2]");
		$author = mysql_fetch_array($getauthor, MYSQL_NUM);
		echo "<div class='box-row bodyline".($i % 2)."'>
				<div class='box' width='100%'><a href='/?song=$song[1]' class='authorlink'>$author[1] - $song[3]</a></div>
			</div>";
		$i++;
	}	
	


?>
</div>
