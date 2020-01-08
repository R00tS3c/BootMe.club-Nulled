<?php
	
	ob_start();
	require_once '../../rip/configuration.php';
	require_once '../../rip/init.php';
	
	if (!($user -> LoggedIn()) || !($user -> notBanned($odb)) || !isset($_SERVER['HTTP_REFERER'])){
		die(error('Error :v ask RiPxSystems'));
	}

		   
	$SQLGetMessages = $odb -> prepare("SELECT * FROM `messages` WHERE `ticketid` = :ticketid ORDER BY `messageid` ASC");
	$SQLGetMessages -> execute(array(':ticketid' => $_GET['id']));
	while ($show = $SQLGetMessages -> fetch(PDO::FETCH_ASSOC)){
		$class = "";
		if($show['sender'] == "Admin"){
			$class = 'class="blockquote-reverse"';
			$username = 'Administrator';
		}
		if ($user -> safeString($show['content'])){
			die(error('Unsafe characters were set'));
		}
		echo '
			<blockquote '. $class .'>
				<h5>'. htmlentities($show['content']).'</h5>
				<footer><span class="badge badge-primary"> '. $show['sender'] .' </span> [ '. date('d-m-Y h:i:s a', $show['date']) .' ]</footer>
			</blockquote>
		';
	}
	
?>