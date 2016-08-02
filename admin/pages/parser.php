
<form method="post">
	<input type="text" name="url"><br>
	<button name="submit">	ДОБАВИТЬ	</button>
</form>
	
<?
	function translitText($str) 
{
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya","+"=>"plus","("=>"",")"=>"","."=>"dot"
    );
    return strtr($str,$tr);
}

	if(isset($_POST['submit'])){
 		
 		$url = $_POST['url'];
 		
 		$out = file_get_contents($url);
 		$preS = explode('<pre class="w-words__text" itemprop="text">', $out);
 		$preS = explode('</pre>', $preS[1]);

 		$name = explode('<h1 class="b-title">', $out);
 		$name = explode('</h1>', $name[1]);
 		$info = explode('-', $name[0]);
 		$preS[0] = str_replace('<span class="b-accord__symbol">', "<kbd>", $preS[0]);
 		$preS[0] = str_replace('</span>', "</kbd>", "$preS[0]");
 		$preS[0] = str_replace("'", "\'", "$preS[0]");
 		$preS[0] = strip_tags($preS[0], '<kbd>');
 		$textid = strtolower(translitText("$info[0]$info[1]"));
 		$textid = str_replace(' ', '', $textid);
 		$textid = trim($textid);

 		echo "	<p>$info[0] - $info[1]</p>
 				<p>textid: ".$textid."</p>
 				<pre>$preS[0]</pre>";

 		$result = mysql_query("select id from authors where author = '$info[0]'");
		
		$row = mysql_fetch_array($result, MYSQL_NUM);


		
		if(empty($row)){
			mysql_query("insert into authors values(0, '$info[0]')");
			
			$result = mysql_query("select id from authors where author = '$info[0]'");
			$row = mysql_fetch_array($result, MYSQL_NUM);
		}
		
		$checksong = mysql_query("select count(*) from songs where authorid = '$row[0]' and songname = '$info[1]'");
		$checksong = mysql_fetch_array($checksong, MYSQL_NUM);
		if(empty($checksong[0])){
			if(mysql_query("insert into songs values(0, '$textid', '$row[0]', '$info[1]', '$preS[0]', '".date("d.m.Y")."', '".$_SESSION['username']."' )")){
				echo"<p id='error'>Все ок!</p>";
			}else{
				echo mysql_error();
			}
		}else{
			echo "<p>Такая песня уже есть в базе!</p>";
		}
		


 	}
 ?>




