<?php

       require '../rip/configuration.php';
       require '../rip/init.php';
       require_once '../tlf/Mobile_Detect.php';

                     $detect = new Mobile_Detect;
 
                     if($detect->isiOS()){
                        $platform = 'Iphone';
                     } elseif ($detect->isAndroidOS()){
                        $platform = 'Android';
                     } else {
                         $platform = 'PC';
                     }
					 
					 if($detect->isIE()){
                        $browsers = 'IE';
                     } elseif ($detect->isFirefox()){
                        $browsers = 'Firefox';
                     } elseif ($detect->isOpera()){
                        $browsers = 'Opera';
                     } else {
                        $browsers = 'Crime';
                     }
					 
          if ($show['cloudflare_set'] == '1') {
          $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
          } else {
          $ip = $_SERVER['REMOTE_ADDR'];
          }
		  
		    if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {    
             $ip = "IPV6";     
            }
		  
		  

$type = $_GET['type'];

if ($type == 'login') {
        session_start();
        $username = $_POST['user'];
        $password = $_POST['password'];
        $shapassword = hash('sha512',$password);
        $errors = array();


        if (empty($username) || empty($password))
        {
die(error('Please fill in all fields.'));
        }
        if (!ctype_alnum($username) || strlen($username) < 4 || strlen($username) > 15)
        {
           die(error('Username Must Be  Alphanumberic And 4-15 characters in length.'));
        }
        

        $checkprior = $odb->prepare("SELECT COUNT(*) FROM logins_failed WHERE ip = ? AND `date` > ?");
        $checkprior->execute(array($ip, time() - 900));
        if($checkprior->fetchColumn() > 5){
            $ripx = "RiPx Is The Best";
die(error('You have attempted to login an excessive amount of times, Try again in 15min.'));
        }
        if (empty($errors))
        {
            if(empty($ripx)){

            $SQLCheckLogin = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username AND `password` = :password");
            $SQLCheckLogin -> execute(array(':username' => $username, ':password' => SHA1(md5($password))));
            $countLogin = $SQLCheckLogin -> fetchColumn(0);
            if ($countLogin == 1)
            {
                $SQLGetInfo = $odb -> prepare("SELECT `username`, `ID`, `status` FROM `users` WHERE `username` = :username AND `password` = :password");
                $SQLGetInfo -> execute(array(':username' => $username, ':password' => SHA1(md5($password))));
                $userInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
                if ($userInfo['status'] == "0")
                {
                    $_SESSION['username'] = $userInfo['username'];
                    $_SESSION['ID'] = $userInfo['ID'];


      $SQL = $odb -> prepare("UPDATE `users` SET `Active` = :rank WHERE `username` = :id");
      $SQL -> execute(array(':rank' => "1", ':id' => $username));

$updatesql = $odb->prepare("UPDATE users SET lastip = ? WHERE username = ?");
$updatesql->execute(array($ip, $username));

$updatesql = $odb->prepare("UPDATE users SET lastlogin = UNIX_TIMESTAMP() WHERE username = ?");
$updatesql->execute(array( $username));

$updatesql = $odb->prepare("UPDATE users SET active = ? WHERE username = ?");
$updatesql->execute(array(1, $username));
$ipcountry = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_countryName'};
    if (empty($ipcountry)) {
        $ipcountry = 'Cannot Be Found';
    }

 $ipcountry = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_countryName'};
    if (empty($ipcountry)) {
        $ipcountry = 'Cannot Be Found';
    }

    $city = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_city'};
    if (empty($city)) {
        $city = 'Cannot Be Found';
    }
    $hostname = gethostbyaddr($ip);


$update = $odb->prepare("UPDATE users SET lastact = ? WHERE username = ?");
$update->execute(array(time(), $username));

         $SQLGetLoginInfo = $odb -> prepare("SELECT * FROM `login_history` ORDER BY `id` DESC;");
		 $SQLGetLoginInfo -> execute(array(':username' => $username));
		 $historyInfo = $SQLGetLoginInfo -> fetch(PDO::FETCH_ASSOC);	
	     $GetData = $odb -> prepare("SELECT * FROM `login_history` WHERE `username` = :username ORDER BY `id` DESC;");
	     $GetData -> execute(array(':username' => $username));
		 $hisInfo = $GetData -> fetch(PDO::FETCH_ASSOC);
				
		  $historyInfo['id'] = $historyInfo['id'] - 5;
          if($hisInfo['id'] < $historyInfo['id']) {
			$SQL = $odb -> prepare("INSERT INTO `login_history`(`id`, `username`, `password`, `ip`, `date`, `status`, `platform`, `method`, `country`) VALUES (NULL,:username,:password,:ip,UNIX_TIMESTAMP(NOW()),'success',:platform,'System_Login',:country)");
			$SQL -> execute(array(":username" => $username, ":password" => 'XX', ":ip" => $ip, ":platform" => $platform, ":country" => $browsers));
           }
		
                        $SQL = $odb -> prepare('INSERT INTO `loginlogss` VALUES(NULL, ?, ?, UNIX_TIMESTAMP(), ?, ?, ?, ?, ?)');
                        $SQL -> execute(array($username, $ip, "Successful", $ipcountry, $city, $hostname, $_SERVER['HTTP_USER_AGENT']));
  echo(success('Login Successful! Redirecting..'));


                }
                else
                {
die(error('You are banned Reason: <strong>'.$userInfo['status'].'</strong>'));
                    
                }
            }
            else
            {
                
$userfailed = preg_replace('@[^0-9a-z\.\-\:\_\,]+@i', '', $username);
$userfailed = strtolower ( $userfailed );


 $ipcountry = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_countryName'};
    if (empty($ipcountry)) {
        $ipcountry = 'Cannot Be Found';
    }

 $ipcountry = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_countryName'};
    if (empty($ipcountry)) {
        $ipcountry = 'Cannot Be Found';
    }

    $city = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_city'};
    if (empty($city)) {
        $city = 'Cannot Be Found';
    }
    $hostname = gethostbyaddr($ip);

                        $SQL = $odb -> prepare('INSERT INTO `loginlogss` VALUES(NULL, ?, ?, UNIX_TIMESTAMP(), ?, ?, ?, ?)');
                        $SQL -> execute(array($username, $ip, "Failed", $ipcountry, $city, $hostname));


                        $SQL = $odb -> prepare('INSERT INTO `logins_failed` VALUES(NULL, ?, ?, UNIX_TIMESTAMP())');
                        $SQL -> execute(array($userfailed, $ip));
                        $t = $odb->prepare("SELECT COUNT(*) FROM logins_failed WHERE ip = ? AND `date` > ?");
                        $t->execute(array($ip, time() - 300));
                        $checking = $t->fetchColumn();

 if ($checking == 4) {
          $checkingg = die(error('This is your last try!!'));
          } else {
          $checkingg = die(error('Login Failed '.$checking.'/5'));
          }

                echo ''.$checkingg.'';
                die;
                    
                            
            }
        }
        }
        else
        {
            echo '>';
            foreach($errors as $error)
            {
                echo '-'.$error.'<br />';
            }
            echo '</center></div>';
        }
    }



if ($type == 'register') {
    session_start();
if (!($_POST['answer'] == SHA1($_POST['question'] . $_SESSION['captcha']))) {
        die(error(' Wrong captcha '));
    }
  

    $username = $_POST['username'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $email = $_POST['email'];


if($rpassword != $password){
    die(error('Passwords Do No Match'));
}
 if (empty($username) || empty($password) || empty($rpassword) || empty($email))
    {
        die(error('Fill In All Fields'));
    }
    else
    {
    $checkUsername = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
    $checkUsername -> execute(array(':username' => $username));
    $countUsername = $checkUsername -> fetchColumn(0);
    $checkEmail = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `email` = :email");
        $checkEmail -> execute(array(':email' => $email));
        $countEmail = $checkEmail -> fetchColumn(0);
        if ($countEmail > 0)
        {
            die(warning('Email Already In Use'));
        }
        else
    {
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(warning('Email is not a valid'));
    }
       else
    {
        if (!ctype_alnum($username) || strlen($username) < 4 || strlen($username) > 15)
        {
        die(error('Please choose a username between 4-15 characters.'));
        }
        else
        {
            if (!($countUsername == 0))
            {
                die(error('Username Taken.'));
            }
            else
            {
				
			$insertUser = $odb -> prepare("INSERT INTO `users` VALUES(NULL, :username, :password, :email, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
			$insertUser -> execute(array(':username' => $username, ':password' => SHA1(md5($password)), ':email' => $email));
					
				
$ipcountry = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))->{'geoplugin_city'};
    if (empty($ipcountry)) {
        $ipcountry = 'XX';
    }
$SQL = $odb -> prepare('INSERT INTO `registerlogs` VALUES(NULL, ?, ?, UNIX_TIMESTAMP(), ?)');
$SQL -> execute(array($username, $ip, $ipcountry));
die(success('Registered Successfully!! <meta http-equiv="refresh" content="3;url=index.php">'));
}
}
}
}
}
}
?>