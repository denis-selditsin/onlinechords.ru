<?include"check.php";?>
	<?
	$songid = $_GET['songid'];
	
	if(empty($songid)){
		$getsongs = mysql_query("select * from songs");
		echo"<div class='boxer'>
				<div class='box-row' id='headline'>
					<div class='box'>id</div>
					<div class='box'>textid</div>
					<div class='box'>Исполнитель</div>
					<div class='box'>Название</div>
					<div class='box'>Действие</div>
				</div>";
		$i = 1;
		while($songs = mysql_fetch_array($getsongs, MYSQL_NUM)){
			
			$getauthor = mysql_query("select author from authors where id = $songs[2]");
			$author = mysql_fetch_array($getauthor, MYSQL_NUM);
			
			echo "<div class='box-row bodyline".($i % 2)."'>
					<div class='box'>$i</div>
					<div class='box'>$songs[1]</div>
					<div class='box'>$author[0]</div>
					<div class='box'>$songs[3]</div>
					<div class='box' id='popular'><a href='index.php?page=update&songid=$songs[1]'>Редактировать</a></div>
				</div>";
				$i++;
		}
		echo"</div>";
		
	}else{
		
		$getsong = mysql_query("select * from songs where textid = '$songid'");
		$song =  mysql_fetch_array($getsong, MYSQL_NUM);
		$id = $song[0];
		$textid = $song[1];
		$authorid = $song[2];
		$songname = $song[3];
		$songtext = $song[4];
		
		$getauthor = mysql_query("select author from authors where id = $authorid");
		$author = mysql_fetch_array($getauthor, MYSQL_NUM);
		
		echo"<div class='adminform'>
				<form method='post' class='song'>
				
					<div class='field'>
					   <label for='textid'>textid:</label>
					   <input type='text' name='textid' value='$textid' />
					</div>
				
					<div class='field'>
					   <label for='songauthor'>Автор:</label>
					   <input type='text' name='songauthor' value='$author[0]'/>
					</div>
					
					<div class='field'>
					   <label for='songname'>Название песни:</label>
					   <input type='text' name='songname' value='$songname'/>
					</div>
					
					<div class='field'>
					   <label for='songtext'>Разбор:</label>
					   <textarea name='songtext' class='song'>$songtext</textarea>
					</div>
					
					<div class='field'>
						<label for='button'></label>
						<button name='remove'>Удалить</button>
					   	<button name='submit'>Сохранить изменения</button>
					</div>
					
				</form>
			</div>";
			
		if(isset($_POST['submit'])){
			if(mysql_query("update songs set textid = '".$_POST['textid']."', songname = '".$_POST['songname']."', songtext = '".$_POST['songtext']."' where id = $id")){
				mysql_query("update authors set author = '".$_POST['songauthor']."' where id = ".$authorid);
				echo"ok";
			}else{
				echo mysql_error();
			}

		}

		if(isset($_POST['remove'])){
			;
			if(mysql_query("delete from songs where id = $id")){
				echo"ok";
			}else{
				echo mysql_error();
			}
		}
		
		
		
	}




?>
