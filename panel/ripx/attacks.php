<?php

    // RiPx is the best ;)
    // if you leak this source you are dead nigga
    // Si publicas la source estas muerto!
  
	ob_start(); 
	require '../rip/configuration.php';
     require '../rip/init.php';

	if (!($user->LoggedIn()) || !($user->notBanned($odb)) || !(isset($_SERVER['HTTP_REFERER']))) {
		die();
	}
	
	$username = $_SESSION['username'];

?>
<table class="table table-striped table-bordered table-vcenter">
	<thead>
   
        <tr>
  
		         <th class="text-center"><i class="text-info">#</i> ID</th>
            <th class="text-center"><i class="fa fa-battery-full text-info"></i> Target</th>
            <th class="text-center"><i class="fa fa-rocket text-primary"></i> Method</th>
            <th class="text-center"><i class="fa fa-server text-info"></i> Servers</th>		
			<th class="text-center"><i class="fa fa-server text-info"></i> Network</th>				
            <th class="text-center"><i class="fa fa-clock-o text-info"></i> Expires</th>
			<th class="text-center"><i class="fa fa-briefcase text-info"></i> Action</th>

        </tr>
    </thead>
    <tbody>
<?php

    $SQLSelect = $odb->query("SELECT * FROM `logs` WHERE user='{$_SESSION['username']}' ORDER BY `id` DESC LIMIT 7");

    while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {

        $ip = $show['ip'];
        $port = $show['port'];
        $time = $show['time'];
        $method = $odb->query("SELECT `fullname` FROM `methods` WHERE `name` = '{$show['method']}' LIMIT 10")->fetchColumn(0);
        $rowID = $show['id'];
        $date = $show['date'];
		$totalservers = $show['totalservers'];
		$vip = $show['vip']; 
		if($vip == 0)
		{
		$vip = "Normal";
		}elseif($vip == 1)
		{
		$vip = "ViP";
		}else
		{
		 $vip = "Error!"; 
		}
		 
        $expires = $date + $time - time();

        if ($expires < 0 || $show['stopped'] != 0) {
            $countdown = '<span class="text-danger"><i class="fa fa-ban"></i> Expired</span>';
        }
		else {
            $countdown = '<div id="a' . $rowID . '"></div>';
            echo "
				<script id='ajax'>
					var count={$expires};
					var counter=setInterval(a{$rowID}, 1000);
					function a{$rowID}(){
						count=count-1;
						if (count <= 0){
							clearInterval(counter);
							attacks();
							return;

						}
					document.getElementById('a{$rowID}').innerHTML=count;
					}
				</script>
			";
        }
		
		
        if ($show['time'] + $show['date'] > time() and $show['stopped'] != 1) {
            $action = '<button type="button" onmousedown="bleep2.play()" onclick="stop(' . $rowID . ')" id="st" class="btn btn-warning btn-trans waves-effect w-md waves-danger m-b-5"><i class="fa fa-power-off"></i> Stop</button>';
        } else {
            $action = '<button type="button" id="rere" onmousedown="bleep4.play()" onclick="renew(' . $rowID . ')" class="btn btn-primary btn-trans waves-effect w-md waves-info m-b-5"><i class="fa fa-refresh"></i> Renew</button>';
        }
		
        echo '<tr class="text-center">
	    <td><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">' . $rowID . '</span></td>
	    <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">' . htmlspecialchars($ip) . ' : ' . $port . ' </span></td>		
		<td><span class="badge badge-primary">' . $method . '</span> </td>
		<td><span class="badge badge-danger">' . $totalservers . ' Serv</span> </td>
		 <td><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">' . $vip . '</span></td>
		<td style="font-size: 15px;" class="text-center">' . $countdown . '</td>
		<td style="font-size: 13px;" class="text-center">' . $action . '</td>
	
		</tr>
		';

    }
?>
	</tbody>
	
</table>
<html>
<head>
    </head>
</html>