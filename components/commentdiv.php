<div id="addcomment">
<p>Добавить комментарий</p>
<hr>
	<form action="index.php" method="post">
	
		<div class="field">
		   <label for="name">Имя</label>
		   <input type="text" name="name" />
		</div>
		
		<div class="field">
		   <label for="lastname">Фамилия</label>
		   <input type="text" name="lastname" />
		</div>
		
		<div class="field">
		   <label for="comment">Текст комментария</label>
		   <textarea name="comment"></textarea>
		</div>
		
		<div class="field">
			<label for="button"></label>
		   <button>Отправить</button>
		</div>
		
	</form>
</div>

<div >
<p>Комментарии</p><hr>

	<div id="comment">
		<div class="datetime">20.05.2016 0:21</div>
		<p id="name">Имя1 Фамилия1</p>
		
		Текст 1
		
	</div>
	
	<div id="comment">
		<div class="datetime">19.05.2016 23:14</div>
		<p id="name">Имя2 Фамилия2</p>
		
		Текст 2

	</div>
	
</div>

