<div class="top">Привет, <?echo $_SESSION['username']?></div>
	<div class="content">
	<?
		$countday = mysql_query("select count(*) from songs where admin = '".$_SESSION['username']."' and date = '".date("d.m.Y")."' ");
		$countday = mysql_fetch_array($countday);

		$countall = mysql_query("select count(*) from songs where admin = '".$_SESSION['username']."'");
		$countall = mysql_fetch_array($countall);

		if(empty($countday[0])) $countday[0]=0;
		echo "За ".date("d.m.Y")." вы добавили <a class='admincount'>$countday[0]/2000</a>";
		$statday = ($countday[0]/2000)*100;
		if($statday > 100) $statday = 100;
	?>
		<div class = "statborder">
			<?echo "<div class='stat' style='width:$statday%'>".round($statday)."%</div>"?>
		</div>

	<?
		if(empty($countall[0])) $countall[0]=0;
		$statall = ($countall[0]/10000)*100;
		echo "<br>Всего вы добавили <a class='admincount'>$countall[0]/10000</a>";
	?>
		<div class = "statborder">

			<?echo "<div class='stat' style='width:$statall%'>".round($statall)."%</div>"?>
		</div>

	</div>