<?
	$letter = $_GET['letter'];
	$authorid = $_GET['authorid'];
	if(empty($authorid)){
		if(!empty($letter)){

			$getauthors = mysql_query("select * from authors");
			echo"<div class='boxer'>
					<div class='box-row' id='headline'>
						<div class='box'>No</div>
						<div class='box' style='width:80%;'>Исполнитель</div>
						<div class='box' style='width:20%;'>Количество песен</div>
					</div>";

			$i = 1;
			while($authors = mysql_fetch_array($getauthors, MYSQL_NUM)){


				$first_l = mb_substr($authors[1], 0, 1,"UTF-8");

				if($letter == $first_l){
					$count = mysql_query("select count(*) from songs where authorid = $authors[0]");
					$count = mysql_fetch_array($count);

					echo "<div class='box-row bodyline".($i % 2)."'>
							<div class='box'>$i</div>
							<div class='box' width='80%'><a href='/?page=alphabet&authorid=$authors[0]' class='authorlink'> $authors[1]</a></div>
							<div class='box'>$count[0]</div>
						</div>";
					$i++;
				}

			}	echo"</div>";
		}else{
			$alphabet="АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯABCDEFGHIGKLMNOPQRSTUVWXYZ0123456789";
				
				for($count = 0;$count<69;$count++){
					$letter = mb_substr($alphabet, $count, 1,"UTF-8");
					$getauthors = mysql_query("select * from authors where author like '$letter%'");
					$authorcount = mysql_query("select count(*) from authors where author like '$letter%'");
					$authorcount = mysql_fetch_array($authorcount);
					if($authorcount[0] != 0){

						echo"<div class='alphauthors'><div style='font-size:88px;'>$letter</div><div class='boxer alphabet'>
								<div class='box-row' id='headline'>
									<div class='box'>No</div>
									<div class='box' style='width:80%;'>Исполнитель</div>
									<div class='box' style='width:20%;'>Количество песен</div>
								</div>";
						$i = 1;
						while($authors = mysql_fetch_array($getauthors, MYSQL_NUM)){


							$first_l = mb_substr($authors[1], 0, 1,"UTF-8");
							$songcount = mysql_query("select count(*) from songs where authorid = $authors[0]");
							$songcount = mysql_fetch_array($songcount);
							echo "<div class='box-row bodyline".($i % 2)."'>
									<div class='box'>$i</div>
									<div class='box' width='80%'><a href='/?page=alphabet&authorid=$authors[0]' class='authorlink'> $authors[1]</a></div>
									<div class='box'>$songcount[0]</div>
								</div>";
								$i++;
						}

					echo"</div></div><hr>";
			
				}
		
			}
		}

	}else{

		$getsongs = mysql_query("select * from songs where authorid = $authorid");
		echo"<div class='boxer'>
				<div class='box-row' id='headline'>
					<div class='box'>No</div>
					<div class='box' style='width:100%;'>Название песни</div>

				</div>";
		$i = 1;
		while($song = mysql_fetch_array($getsongs, MYSQL_NUM)){

			echo "<div class='box-row bodyline".($i % 2)."'>
					<div class='box'>$i</div>
					<div class='box' width='100%'><a href='/?song=$song[1]' class='authorlink'>$song[3]</a></div>
				</div>";
			$i++;
		}
		echo"</div>";




	}
	






?>

