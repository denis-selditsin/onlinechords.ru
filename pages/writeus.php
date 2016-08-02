<div >
	<form method="post" class="message">
	
		<div class="field">
		   <label for="name">Имя:</label>
		   <input type="text" name="name" />
		</div>
	
		<div class="field">
		   <label for="songauthor">E-mail:</label>
		   <input type="email" name="email" />
		</div>

		<div class="field">
		   <label for="topic">Тема:</label>
		   <input type="text" name="topic" />
		</div>
		
		<div class="field">
		   <label for="message">Сообщение:</label>
		   <textarea name="message" class="message"></textarea>
		</div>
		
		<div class="field">
			<label for="button"></label>
		   <button name="submit">Отправить сообщение</button>
		</div>
		
	</form>
</div>

<?
	$name = $_POST['name'];
	$email = $_POST['email'];
	$topic = $_POST['topic'];
	$message = $_POST['message'];

	if(isset($_POST['submit'])){
		if(!empty($name) && !empty($email) && !empty($topic) && !empty($message)){
			if(mysql_query("insert into messages values(0, '$name', '$email', '$topic', '$message')")){
				echo"<p id='error'>Сообщение отправлено.</p>";
			}else{echo"<p id='error'>Ошибка работы базы данных</p>";}
		}else{
			echo"<p id='error'>Заполните все поля!</p>";
		}
	}
		

?>