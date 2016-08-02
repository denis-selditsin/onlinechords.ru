<?include"check.php";
?>

<div class="adminform">
	<form method="post" class="song">
	
		<div class="field">
		   <label for="textid">textid:</label>
		   <input type="text" name="textid" />
		</div>
	
		<div class="field">
		   <label for="songauthor">Автор:</label>
		   <input type="text" name="songauthor" />
		</div>
		
		<div class="field">
		   <label for="songname">Название песни:</label>
		   <input type="text" name="songname" />
		</div>
		
		<div class="field">
		   <label for="songtext">Разбор:</label>
		   <textarea name="songtext" class="song"></textarea>
		</div>
		
		<div class="field">
			<label for="button"></label>
		   <button>Отправить</button>
		</div>
		
	</form>
</div>
<?

	$textid = $_POST['textid'];
	$songauthor = $_POST['songauthor'];
	$songname = $_POST['songname'];
	$songtext = $_POST['songtext'];
	
	if(!empty($textid) && !empty($songauthor) && !empty($songname) && !empty($songtext)){
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
			echo "Такая песня уже есть в базе! ";
		}
		

	}else{
		echo"<p id='error'>Заполните все поля!</p>";
	}

?>





















