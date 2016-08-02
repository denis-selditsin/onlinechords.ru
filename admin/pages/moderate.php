<?
	include"check.php";

	$songid = $_GET['songid'];
	
	if(empty($songid)){
		$getsongs = mysql_query("select * from offers");
		echo"<div class='boxer'>
				<div class='box-row' id='headline'>
					<div class='box'>id</div>
					<div class='box'>textid</div>
					<div class='box'>Исполнитель</div>
					<div class='box'>Название</div>
					<div class='box'>Действие</div>
				</div>";
		while($songs = mysql_fetch_array($getsongs, MYSQL_NUM)){
			
			echo "<div class='box-row bodyline".($i % 2)."'>
					<div class='box'>$songs[0]</div>
					<div class='box'>$songs[1]</div>
					<div class='box'>$songs[2]</div>
					<div class='box'>$songs[3]</div>
					<div class='box' id='popular'><a href='index.php?page=moderate&songid=$songs[1]'>Редактировать</a></div>
				</div>";
		}
		echo"</div>";
		
	}else{
		
		$getsong = mysql_query("select * from offers where textid = '$songid'");
		$song =  mysql_fetch_array($getsong, MYSQL_NUM);
		$id = $song[0];
		$textid = $song[1];
		$author = $song[2];
		$songname = $song[3];
		$songtext = $song[4];
		
		echo"<div class='adminform'>
				<form method='post' class='song'>
				
					<div class='field'>
					   <label for='textid'>textid:</label>
					   <input type='text' name='textid' value='$textid' />
					</div>
				
					<div class='field'>
					   <label for='songauthor'>Автор:</label>
					   <input type='text' name='songauthor' value='$author'/>
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
			if(!empty($textid) && !empty($author) && !empty($songname) && !empty($songtext)){
				$result = mysql_query("select id from authors where author = '$songauthor'");
				
				$row = mysql_fetch_array($result, MYSQL_NUM);
				
				if(empty($row)){
					mysql_query("insert into authors values(0, '$author')");
					
					$result = mysql_query("select id from authors where author = '$songauthor'");
					$row = mysql_fetch_array($result, MYSQL_NUM);
				}
				
				mysql_query("insert into songs values(0, '$textid', '$row[0]', '$songname', '$songtext')");

				mysql_query("delete from offers where textid = '$textid'");
				
				echo"<p id='error'>Все ок!</p>";
			}else{
				echo"<p id='error'>Заполните все поля!</p>";
			}	
		}else if(isset($_POST['remove'])){
			mysql_query("delete from offers where textid = '$textid'");
		}
	}
?>