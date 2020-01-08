<?php 
$validate = (bool)ip2long($_SERVER['HTTP_HOST']);
if($validate == true){
	echo '';
	return;
}
	header('Location: http://dstat.blizzard-stresser.xyz');

?>