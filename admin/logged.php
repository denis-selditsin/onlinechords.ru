<?php
	session_start();
	$logged = $_SESSION['logged'];
	if(!$logged){

		echo"Выйди и войди нормально!";

	}else{
		$textid = preg_replace ("/[^a-zA-ZА-Яа-я0-9\s]/","",$_GET['page']);
	
	?>
		<header style="height:50px;">
			<div class="menu" id="nav">
				<ul>
					<li><a href="index.php?page=add">Добавить</a></li>
					<li><a href="index.php?page=update">Редактировать</a></li>
					<li><a href="index.php?page=parser">Парсер</a></li>
					<li><a href="index.php?page=moderate">Предложенные</a></li>
					<li><a href="index.php?page=messages">Сообщения</a></li>
				</ul>
				<div class="column" style="padding:0 0 0 0px;">
					<div id="sb-search" class="sb-search" style="padding:0 0 0 0px; width:60px;">
						<form action="logout.php" method="POST" class="auth">
							<button id="logout">Выйти</button>
						</form>
					</div>
				</div>
			</div>
		</header><br>

		<div class="body" id="admin"> 

		<aside style="padding:8px 0 8px 0;">
			<div class="leftmenu">
				<?include"includes/control.php";?>
			</div>
		</aside>
		
		<div style="padding:8px 0 8px 0;"  id="admin" class = "right">
			<div class="main" >
			
				<div class="top">
					<?echo $pagename?>
				</div>
				
				<div class="content">
					<?include "pages/$pagetext";
					
					if($issong){
						include"commentdiv.php";
					}
					
					?>
				</div>
				
			</div>
		</div>


		
		
		
		
		
			
			<footer class="admin">
				Вернуться на сайт: <a href="../">Onlinechords.ru</a>
			</footer>
		</div>
		
		
		
		
		
		
		
	<?
	}
?>



