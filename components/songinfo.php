<hr>
<p>Другие песни исполнителя: </p>
<div>
<?
	$textid = $_GET['song'];
	$getauthorid = mysql_query("select authorid from songs where textid = '$textid'");
	$authorid = mysql_fetch_array($getauthorid);

	$getsongs = mysql_query("select * from songs where authorid = $authorid[0] order by rand() limit 5");

	while($songs = mysql_fetch_array($getsongs)){

		$getauthor = mysql_query("select author from authors where id = $songs[2]");
		$author = mysql_fetch_array($getauthor);

		echo"<a href='/?song=$songs[1]' class='authorlink'>$author[0] - $songs[3]</a><br>";

	}
?>
</div>