<?php


	ob_start(); 
	require '../../rip/configuration.php';
    require '../../rip/init.php';

	if (!($user->LoggedIn()) || !($user->notBanned($odb)) || !($user -> isAdmin($odb)) || !(isset($_SERVER['HTTP_REFERER']))) {
		die();
	}
?>
<table class="table">
	<thead>
        <tr>
            <th style="font-size: 12px;" class="text-center">User</th>
            <th style="font-size: 12px;" class="text-center">Target</th>
            <th style="font-size: 12px;" class="text-center">Method</th>
			<th style="font-size: 12px;" class="text-center">Network</th>
			<th style="font-size: 12px;" class="text-center">Servers</th>
			<th style="font-size: 12px;" class="text-center">Servers Per Attack</th>
			<th style="font-size: 12px;" class="text-center">Attack system</th>
            <th style="font-size: 12px;" class="text-center">Expires</th>
			<th style="font-size: 12px;" class="text-center">Stop</th>
        </tr>
    </thead>
    <tbody>
<?php
    $SQLSelect = $odb->query("SELECT * FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 ORDER BY `id` DESC");
    while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
        $method  = $odb->query("SELECT `fullname` FROM `methods` WHERE `name` = '{$show['method']}' LIMIT 1")->fetchColumn(0);
        $rowID   = $show['id'];
		$vip   = $show['vip'];
		$chart   = $show['chart'];
		$totalservers   = $show['totalservers'];
		
		                            if($vip == "0")
									{
										$vip = '<span class="text-warning font-w700"></i> Normal Network <i class="fa fa-rocket text-danger"></i></span>';
									}
									
									if($vip == "1")
									{
										$vip = '<span class="text-danger font-w700"></i> VIP Network <i class="si si-fire text-warning"></i></span>';
									}
									
									if($vip == "3")
									{
										$vip = '<span class="text-danger font-w700"></i> Free Network <i class="si si-fire text-successs"></i></span>';
									}
									
									if($chart == "0")
									{
										$chart = '<span class="text-warning font-w700"></i> API ACCESS ATTACK <i class="fa fa-bolt text-success"></i></span>';
									}
									else {
$chart = '<span class="text-warning font-w700"></i> HUB ATTACK <i class="fa fa-bolt text-info"></i></span>';
}

									
        $expires = $show['date'] + $show['time'] - time();
		$countdown = '<div id="a' . $rowID . '"></div>';
        echo '			<tr style="font-size: 12px;" class="text-center">
				<td><span style="color: green;">' . $show['user'] . '</span> </td>
				<td><span style="color: yellow;">' . htmlspecialchars($show['ip']) . ': </span> <span style="color: orange;">'.$show['port'] . ' </span> </td>
				<td><span style="color: yellow;">' . $method . '</span></td>
				<td><span style="color: gold;">' . $vip . '</span></td>
				<td><span style="color: red;">'.$show['handler'] . '</span></td>
				<td><span style="color: gold;">' . $totalservers . '</span></td>
				<td><span style="color: gold;">' . $chart . '</span></td>
				<td>' .$expires.' </td>
				<td><button type="button" onclick="stop(' . $rowID . ')" id="st" class="btn btn-warning btn-circule"><i class="fa fa-power-off"></i> Stop</button></td>
			</tr>		';	
	}
?> 

	</tbody>
</table><script id="ajax"><?php	$SQLSelect = $odb->query("SELECT * FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 ORDER BY `id` DESC");    while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {        $rowID   = $show['id'];        $expires = $show['date'] + $show['time'] - time();		echo '			var a'.$rowID.' = setInterval(a' . $rowID . ', 1000);			var c'.$rowID.' = '.$expires.';			function a' . $rowID . '(){				c'.$rowID.'=c'.$rowID.'-1;				if (c'.$rowID.' <= 0){					clearInterval(a'.$rowID.');					adminattacks();				}				document.getElementById("a' . $rowID . '").innerHTML=c'.$rowID.';			}		';	}?></script>