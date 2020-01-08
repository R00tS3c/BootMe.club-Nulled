<?php
if (($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}

	if (!isset($_SERVER['HTTP_REFERER'])){
		die;
	}
	
	ob_start();
	require_once '../rip/configuration.php';
	require_once '../rip/init.php';


	if (!($user -> LoggedIn()) || !($user -> notBanned($odb))){
		die();
	}
   
	$username = $_GET['username'];

	if(empty($username)){
		die();
	}
	
	if ($user -> safeString($username)){
        $error = error('What are you trying?');  
    }

	$lastactive = $odb -> prepare("UPDATE `users` SET activity=UNIX_TIMESTAMP() WHERE username=:username");
    $lastactive -> execute(array(':username' => $_SESSION['username']));

?>