В поле "<b>textid</b>" напишите имя исполнителя и название песни транслитом одним словом. <br><br>
	Например: <a href="/?song=splinmoyeserdce" class='authorlink'>Сплин - мое сердце</a> - <a href="/?song=splinmoyeserdce" class='authorlink'>splinmoyeserdce</a>
<div >
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
		   <button name="submit">Предложить разбор</button>
		</div>
		
	</form>
</div>

<?
	$textid = $_POST['textid'];
	$songauthor = $_POST['songauthor'];
	$songname = $_POST['songname'];
	$songtext = $_POST['songtext'];
	
	if(isset($_POST['submit'])){  
		if(!empty($textid) && !empty($songauthor) && !empty($songname) && !empty($songtext)){
			
			
			if(mysql_query("insert into offers values(0, '$textid', '$songauthor', '$songname', '$songtext')")){
				echo"<p id='error'>Разбор отправлен на проверку модератора.</p>";
			}else{echo"<p id='error'>Ошибка работы базы данных</p>";}
		}else{
			echo"<p id='error'>Заполните все поля!</p>";
		}
	}

?>