
		
<?php

  // RiPx is the best ;)
  // if you leak this source you are dead nigga
  // Si publicas la source estas muerto!
  
   function _ago($tm,$rcs = 0) {
           $cur_tm = time(); 
           $dif = $cur_tm-$tm;
           $pds = array('second','minute','hour','day','week','month','year','decade');
           $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
           for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
           $no = floor($no);
           if($no <> 1)
           $pds[$v] .='s';
           $x = sprintf("%d %s ",$no,$pds[$v]);
           if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0))
           $x .= time_ago($_tm);
           return $x;
    }
	
	class user {
		
		function realIP(){
			switch(true){
			  case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
			  case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
			  default : return $_SERVER['REMOTE_ADDR'];
			}
		}
              
   	   
	
		function isAdmin($odb){
		 $SQL = $odb -> prepare("SELECT `rank` FROM `users` WHERE `ID` = ?");
		
	     $SQL -> execute(array($_SESSION['ID']));
		 
	     $rank = $SQL -> fetchColumn(0);
		 
		 if ($rank == 69){
			 return true;
			} else{
			 return false;
			}
		}
		
		function isSupport($odb){
		 $SQL = $odb -> prepare("SELECT `rank` FROM `users` WHERE `ID` = ?");
		
	     $SQL -> execute(array($_SESSION['ID']));
		 
	     $rank = $SQL -> fetchColumn(0);
		 
		 if ($rank == 15){
			 return true;
			} else{
			 return false;
			}
		}
		
		function availableuser($odb, $user){
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `username` = ?");
			$SQL -> execute(array($user));
			$count = $SQL -> fetchColumn(0);
			if ($count == 1){
				return true;
			} else{
				return false;
			}
		}
		
		function LoggedIn(){
			@session_start();
			if (isset($_SESSION['username'], $_SESSION['ID'])){
				return true;
			} else {
				return false;
			
			}
		}
		
    	function isVip($odb){
            $SQL = $odb->prepare("SELECT `avip` FROM `users` WHERE `username` = :username");
            $SQL -> execute(array(':username' => $_SESSION['username']));
			$avip = $SQL -> fetchColumn(0);			
			$SQL = $odb -> prepare("SELECT `vip` FROM `plans` LEFT JOIN `users` ON users.membership = plans.ID WHERE users.username = ?");
			$SQL -> execute(array($_SESSION['username']));
			$vip = $SQL -> fetchColumn(0)+$avip;
			if ($vip == 2){
				return true;
			} else{
				return false;
			}
		}    
		
		function api($odb){
			$SQL = $odb -> prepare("SELECT `plans`.`api` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = ?");
			$SQL -> execute(array($_SESSION['ID']));
			$api = $SQL -> fetchColumn(0);
			if ($api == 1){
				return true;
			} else{
				return false;
			}
		} 
		
		function captcha($response, $secret) {
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = ['secret'   => $secret,
					 'response' => $response,
					 'remoteip' => $_SERVER['REMOTE_ADDR']];

			$options = [
				'http' => [
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => http_build_query($data) 
				]
			];

			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
			return json_decode($result)->success;
		}
		
	   function isVerified($odb)
    	{
		$SQLS = $odb -> prepare("SELECT `security_question` FROM `users` WHERE `ID` = :id");
		$SQLS -> execute(array(':id' => $_SESSION['ID']));
		$SQLQ = $odb -> prepare("SELECT `answer_question` FROM `users` WHERE `ID` = :id");
		$SQLQ -> execute(array(':id' => $_SESSION['ID']));
		$SQLC = $odb -> prepare("SELECT `code_account` FROM `users` WHERE `ID` = :id");
		$SQLC -> execute(array(':id' => $_SESSION['ID']));
		$SQLScheck = $SQLS -> fetchColumn(0);
		$SQLQcheck = $SQLQ -> fetchColumn(0);
		$checkverify = $SQLC -> fetchColumn(0);
		if ($checkverify != "0" && $SQLQcheck != "0" && $SQLScheck != "0")
		{
			return true;
		}
		else
		{
			return false;
		}
	    }
		
		function hasMembership($odb){
			$SQL = $odb -> prepare("SELECT `expire` FROM `users` WHERE `ID` = ?");	$SQL -> execute(array($_SESSION['ID'])); $expire = $SQL -> fetchColumn(0);
			if (time() < $expire){ return true; } else{
				$SQLupdate = $odb -> prepare("UPDATE `users` SET `membership` = 0 WHERE `ID` = ?");
				$SQLupdate -> execute(array($_SESSION['ID']));
				return false;
			}
		}
		
		function notBanned($odb){
			$SQL = $odb -> prepare("SELECT `status` FROM `users` WHERE `ID` = ?"); $SQL -> execute(array($_SESSION['ID']));
			$result = $SQL -> fetchColumn(0);
			if ($result == 0){ return true; } else{
				session_destroy();
				return false;
			}
		}
		
		function safeString($string){
			$upper_string = strtoupper($string);
			$parameters = array("<SCRIPT", "UPDATE `", "ALERT(", "<IFRAMW", "<", ">", "</", "/>", "SCRIPT>", "SCRIPT", "DIV", ".CCS", ".JS", "<META", "<FRAME", "<EMBED", "<XML", "<IFRAME", "<IMG", "HREF", "document.cookie");
			foreach ($parameters as $parameter){
				if (strpos($upper_string,$parameter) !== false){
					return true;
				}
			}
		}	
	}
	
	class stats {
		
		function totalUsers($odb){
			$SQL = $odb -> query("SELECT COUNT(*) FROM `users`");
			return $SQL->fetchColumn(0);
		}
		
		function activeUsers($odb){
			$SQL = $odb -> query("SELECT COUNT(*) FROM `users` WHERE `expire` > UNIX_TIMESTAMP()");
			return $SQL->fetchColumn(0);
		}
				
		function onlineTotal($odb) {
		$SQL = $odb -> query("SELECT COUNT(*) FROM `users` WHERE `last_active` > UNIX_TIMESTAMP()");
			return $SQL->fetchColumn(0);
		}
		
		function totalBoots($odb){
			$SQL = $odb -> query("SELECT COUNT(*) FROM `logs`");
			return $SQL->fetchColumn(0);
		}

		function totalPools($odb){
			$SQL = $odb -> query("SELECT COUNT(*) FROM `api`");
			return $SQL->fetchColumn(0);
		}
		
		function runningBoots($odb){
			$SQL = $odb -> query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
			return $SQL->fetchColumn(0);
		}
		
			function concurrents($odb){
			$SQL = $odb->prepare("SELECT `aconcu` FROM `users` WHERE `users`.`ID` = :id");
			$SQL ->execute(array(':id' => $_SESSION['ID']));
			$aconcu = $SQL -> fetchColumn(0);
			
			$SQL = $odb -> prepare("SELECT `plans`.`concurrents` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = ?");
			$SQL -> execute(array($_SESSION['ID']));
			return $SQL->fetchColumn(0)+$aconcu;
		}
		
		function mbt($odb){
			$SQL = $odb -> prepare("SELECT `plans`.`mbt` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = ?");
			$SQL -> execute(array($_SESSION['ID']));
			return $SQL->fetchColumn(0);
		}


		function countRunning($odb, $user){
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `user` = ?  AND `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0");
			$SQL -> execute(array($user));
			return $SQL->fetchColumn(0);
		}
		
		function totalBootsForUser($odb, $user){
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `user` = ?");
			$SQL -> execute(array($user));
			return $SQL->fetchColumn(0);
		}
		
		function purchases($odb){
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `payments` WHERE `user` = ?");
			$SQL -> execute(array($_SESSION['ID']));
			return $SQL->fetchColumn(0);
		}
		
		function tickets($odb){
			$SQL = $odb -> prepare("SELECT * FROM `tickets` WHERE `username` = ? AND `status` = 'Waiting for user response' ORDER BY `id` DESC");
			$SQL -> execute(array($_SESSION['username']));
			return $SQL->fetchColumn(0);
		}
		
		function admintickets($odb){
			$SQL = $odb -> query("SELECT COUNT(*) FROM `tickets` WHERE `status` = 'Waiting for admin response'");
			return $SQL->fetchColumn(0);
		}
		
		function usersforplan($odb, $plan)
		{
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `membership` = ?");
			$SQL -> execute(array($plan));
			return $SQL->fetchColumn(0);
		}
	}
	


?>