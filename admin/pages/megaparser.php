 <?
 	$url = "http://hm6.ru/vse_ispolniteli";

 	$out = file_get_contents($url);

 	$singer = explode('<div class="ch_songer">', $out);

 	echo count($singer);

 	for($m = 1; $m < count($singer); $m++){
	 	$singers = explode('<a href="', $singer[$m]);
	 	$singers = explode('">', $singers[1]);
	 	echo "<br>".$singers[0];
	}	 	

 	
 		


 ?>