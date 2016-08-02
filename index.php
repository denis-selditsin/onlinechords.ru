<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/style.css" /> 
		<link rel="stylesheet" type="text/css" href="styles/forms.css" />
		<link rel="stylesheet" type="text/css" href="styles/header.css" />
		<link rel="stylesheet" type="text/css" href="styles/body.css" />
		<link rel="stylesheet" type="text/css" href="styles/footer.css" />
		<link rel="stylesheet" type="text/css" href="styles/comments.css" />
		<link rel="stylesheet" type="text/css" href="styles/song.css" />
		<link rel="stylesheet" type="text/css" href="styles/component.css" />
		<link rel="icon" href="img/favicon.ico" type="image/x-icon" /> 
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?123"></script>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?124"></script>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript">
			VK.init({apiId: 5550842, onlyWidgets: true});
		</script>

	    <meta charset="utf-8">

	</head>
	
	<body>
		<?include "controls/control.php";?>
		<title><?echo $pagename;?></title>

		<header>
			<div class="menu" id="nav">
				<ul>
					<li><a href="/">Главная</a></li>
					<li><a href="/?page=alphabet">Исполнители по алфавиту</a></li>
					<li><a href="/?page=addsong">Добавить разбор</a></li>
					<li><a href="/?page=writeus">Написать нам</a></li>
				</ul>
				<div class="column" style="padding:0 0 0 32px;">
							<div id="sb-search" class="sb-search" style="padding:0">
								<form action="/?page=search.php" method="get">
									<input class="sb-search-input" placeholder="Что будете искать?" type="text" value="" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"></span>
								</form>
							</div>
						</div>
			</div>
			
			<div class="topside">
				<a href="/"><img src="img/logo.png" height="92"></a>
			</div>

		
		
		</header>
		
		<div class="body">
			<?include"includes/alphabet.php";?>
			<aside>
				<div class="leftmenu">
					<?include"includes/new.php";?>
				</div>

				<div class="leftmenu">
					<?include"includes/vkgroup.php";?>
				</div>
			</aside>
			
			<div class="right">
				<div class="main">
					<div class="top">
						<?echo $pagename;?>
					</div>
					<div class="content">
						<?
							
							if($issong){
								echo "$pagetext";
								include"components/songinfo.php";

							}else{
								include"pages/$pagetext";
							}
						?>
					
					
						
						
						

						
					</div>
				</div>
			
			</div>
			<footer>
				&copy; 2016 <a href = "/">OnlineChords.ru</a><br/>
				Разработка сайта: Денис Сельдицин<br>
				<a href="/">Главная</a> | <a href="/?page=alphabet">Исполнители по алфавиту</a> | <a href="/?page=addsong">Добавить разбор</a> | <a href="/?page=writeus">Написать нам</a>
			</footer>
		</div>	
			
		<script src="js/classie.js"></script>
		<script src="js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
		<br>
	</body>

</html>