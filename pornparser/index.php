
<?


	$c = file_get_contents("https://api.vk.com/method/video.get?owner_id=-111618922&count=200&offset=".$_GET['offset']."&access_token=ed71847b861558ae651d3b79165fa49cfbd9e76c828c2e3fd78da3d5984c913fbdd4634e804a8ae8b6ff3&v=V"); 
	$c = json_decode($c);

	$link = $c->response[rand(1,200)]->link;
	//$link = str_replace("-", "", $link);

	echo '<a href = "https://api.vk.com/method/messages.send?user_id=222523277&attachment='.$link.'&access_token=ed71847b861558ae651d3b79165fa49cfbd9e76c828c2e3fd78da3d5984c913fbdd4634e804a8ae8b6ff3&v=V">Отправить Денису</a><br>';

	echo '<a href = "https://api.vk.com/method/messages.send?user_id=283561683&attachment='.$link.'&access_token=ed71847b861558ae651d3b79165fa49cfbd9e76c828c2e3fd78da3d5984c913fbdd4634e804a8ae8b6ff3&v=V">Отправить Алине</a>';

?>



