<?include "checker.php";?>
<center>
<div class="auth">
	<div class="top">Авторизация</div>
	<div class="content">
		<form action="index.php" method="POST" width="300px" class="auth">
			<input name="username" placeholder="Логин" class="auth"><br>
			<input name="password" type="password" placeholder="Пароль" class="auth"><br>
			<button class="auth">Войти</button>
		</form>
		<?if(!empty($error)){?>
			<p id="error"><?echo $error?></p>
		<?}?>
	</div>
</div>
</center>