<?php

	ob_start(); 
	require '../../rip/configuration.php';
    require '../../rip/init.php';

	$stop      = intval($_GET['id']);
	$SQLSelect = $odb->query("SELECT * FROM `logs` WHERE `id` = '$stop'");

	while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
		$user = $show['user'];
		$host   = $show['ip'];
		$port   = $show['port'];
		$time   = $show['time'];
		$method = $show['method'];
		$handler = $show['handler'];
		
		//$command  = $odb->query("SELECT `command` FROM `methods` WHERE `name` = '$method'")->fetchColumn(0);
	}
	
	$SQL      = $odb->query("UPDATE `logs` SET `stopped` = 1 WHERE `id` = '$stop'");
	
	$handlers = explode(",", $handler);

	foreach ($handlers as $handler){

		

			$SQLSelectAPI = $odb->query("SELECT `api` FROM `api` WHERE `name` = '$handler' ORDER BY `id` DESC");

			while ($show = $SQLSelectAPI->fetch(PDO::FETCH_ASSOC)) {

				$arrayFind 	  = array('[host]','[port]','[time]','[method]');
				$arrayReplace = array($host,$port,$time,$method);
				$APILink      = $show['api'];
				$APILink      = str_replace($arrayFind, $arrayReplace, $APILink);
				$stopcommand  = "&method=STOP";
				$stopapi      = $APILink . $stopcommand;
				
				$ch           = curl_init();
				curl_setopt($ch, CURLOPT_URL, $stopapi);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_TIMEOUT, 2);
				curl_exec($ch);
				curl_close($ch);
			}
	
	}
	die(success('Attack Has Been Stopped!'));
	
?>