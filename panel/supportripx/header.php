<?php
require "inferno/anti-ddos-lite.php";
require_once 'rip/configuration.php';
require_once 'rip/init.php';

if (!$user -> LoggedIn()){
    header('Location: login.php');
    exit;
}

$userInfoData = $odb->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['ID'] . "' LIMIT 1");
$userInfo = $userInfoData->fetch(PDO::FETCH_BOTH);

if($userInfo["rank"]<0)
{
    header('Location: login.php');
    exit;
}
function hasBNAccess($db){
	$stmt = $db->prepare("SELECT botnet FROM users WHERE username=:login");
	$stmt->bindParam("login", $_SESSION['username'], PDO::PARAM_STR);
	$stmt->execute();
	$value = $stmt->fetchColumn(0);
	return $value;
}
$lastactive = $odb -> prepare("UPDATE `users` SET activity=UNIX_TIMESTAMP() WHERE username=:username");
$lastactive -> execute(array(':username' => $_SESSION['username']));

 $onedayago = time() - 86400;

 $twodaysago = time() - 172800;
 $twodaysago_after = $twodaysago + 86400;

 $threedaysago = time() - 259200;
 $threedaysago_after = $threedaysago + 86400;

 $fourdaysago = time() - 345600;
 $fourdaysago_after = $fourdaysago + 86400;

 $fivedaysago = time() - 432000;
 $fivedaysago_after = $fivedaysago + 86400;

 $sixdaysago = time() - 518400;
 $sixdaysago_after = $sixdaysago + 86400;

 $sevendaysago = time() - 604800;
 $sevendaysago_after = $sevendaysago + 86400;
 
 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` > :date");
 $SQL -> execute(array(":date" => $onedayago));
 $count_one = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $twodaysago, ":after" => $twodaysago_after));
 $count_two = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $threedaysago, ":after" => $threedaysago_after));
 $count_three = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $fourdaysago, ":after" => $fourdaysago_after));
 $count_four = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $fivedaysago, ":after" => $fivedaysago_after));
 $count_five = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $sixdaysago, ":after" => $sixdaysago_after));
 $count_six = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $sevendaysago, ":after" => $sevendaysago_after));
 $count_seven = $SQL->fetchColumn(0);
 
 $date_one = date('d/m/Y', $onedayago);
 $date_two = date('d/m/Y', $twodaysago);
 $date_three = date('d/m/Y', $threedaysago);
 $date_four = date('d/m/Y', $fourdaysago);
 $date_five = date('d/m/Y', $fivedaysago);
 $date_six = date('d/m/Y', $sixdaysago);
 $date_seven = date('d/m/Y', $sevendaysago);

     $plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
     $plansql -> execute(array(":id" => $_SESSION['ID']));
     $row = $plansql -> fetch(); 
     $date = date("m-d-Y, h:i:s a", $row['expire']);
     if (!$user->hasMembership($odb)){
         $row['mbt'] = 0;
         $row['concurrents'] = 0;
         $row['name'] = 'No membership';
         $date = '0-0-0';
     }
     
     $SQL = $odb -> prepare("SELECT * FROM `users` WHERE `username` = :usuario");
             $SQL -> execute(array(":usuario" => $_SESSION['username']));
             $balancebyripx = $SQL -> fetch();
             $balance = $balancebyripx['balance'];
     ?>
<!doctype html>
<html lang="en" class="no-focus"><!--<![endif]--><head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
 <link href="../assets/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

        <title><?php echo $sitename; ?> | <?php echo $page; ?></title>

        <link rel="shortcut icon" href="../assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon-180x180.png">
        <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">
        <link rel="stylesheet" href="../assets/js/plugins/jquery-jvectormap/jquery-jvectormap.min.css">
        <link rel="stylesheet" id="css-main" href="../assets/css/animations.css">
        <link href="../assets/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../assets/js/plugins/jquery-jvectormap/jquery-jvectormap.min.css">
		<link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
		<link rel="stylesheet" href="../assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
		<link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
 
    </head>
<body class="" style="">
  <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed page-header-modern main-content-boxed">
    <aside id="side-overlay">
</aside>

  <nav id="sidebar">                <div id="sidebar-scroll">
                    <div class="slimScrollBar">
                        <div class="content-header content-header-fullrow px-15">
                            <div class="content-header-section sidebar-mini-visible-b">
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                            </div>
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <div class="content-header-item tossing">
                                    <a class="link-effect font-w700" href="index.html">
                                        <i class="si si-fire text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">Private</span><span class="font-size-xl text-primary">Panel!</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                <img class="img-avatar img-avatar32" src="avatar-user.png" alt="">
                            </div>
                            <div class="sidebar-mini-hidden-b text-center">
                                <a class="img-link" href="profile.php">
                                    <img class="img-avatar" src="../avatar-user.png" alt="">
                                </a>
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase tossing" href="profile.php"><?php echo ucfirst($_SESSION['username']); ?></a>
                                    </li>
                                      <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="link-effect text-dual-primary-dark" onclick="logOutByRiPx()">
                                            <i class="si si-logout"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
							       <li>
                                    <a <?php if ($page=='Dashboard' ) { echo 'class="active"'; } ?> href="home.php">
                                    <i class="fa fa-home"></i>Home</a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='API' ) { echo 'class="active"'; } ?> href="apix.php">
                                    <i class="fa fa-bolt text-warning"></i> API </a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='Settings' ) { echo 'class="active"'; } ?> href="adjustes.php">
                                    <i class="fa fa-code"></i>Settings</a>
								   </li>								   
                                   <li>
                                    <a <?php if ($page=='GiftSettings' ) { echo 'class="active"'; } ?> href="giftsadjustes.php">
                                    <i class="fa fa-code"></i>Gift Settings</a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='LiveAttacks' ) { echo 'class="active"'; } ?> href="liveattacks.php">
                                    <i class="fa fa-cog text-success"></i>LiveAttacks</a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='Blacklist' ) { echo 'class="active"'; } ?> href="blacklist.php">
                                    <i class="fa fa-ban text-danger"></i>Blacklist</a>
								   </li>
								   <li>
                                    <a <?php if ($page=='AttackLogs' ) { echo 'class="active"'; } ?> href="attacklogs.php">
                                    <i class="fa fa-ban text-primary"></i>Attacks Logs</a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='LoginLogs' ) { echo 'class="active"'; } ?> href="loginlogs.php">
                                    <i class="fa fa-bolt text-primary"></i>Login Logs</a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='News' ) { echo 'class="active"'; } ?> href="news.php">
                                    <i class="fa fa-space-shuttle"></i>News Manager</a>
								   </li>
								   <li>
                                    <a <?php if ($page=='Members' ) { echo 'class="active"'; } ?> href="members.php">
                                    <i class="fa fa-users text-warning"></i>Members</a>
								   </li>  
								   <li>
                                    <a <?php if ($page=='Back to Hub' ) { echo 'class="active"'; } ?> href="../hub.php">
                                    <i class="fa fa-backward text-danger"></i>Back To Hub</a>
								   </li>			
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
			
            <header id="page-header">        
                <div class="content-header">
                    <div class="content-header-section">
             
                        <button type="button" class="btn btn-primary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </div>
           <div class="content-header-section" role="group">

</div>
                </div>
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
								
                                <input type="text" class="form-control" placeholder="" id="page-header-search-input" name="page-header-search-input">
								
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
      
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
    
            </header>
<script>
				    window.setInterval(function(){
					var xmlhttp;
					if (window.XMLHttpRequest){
				    xmlhttp = new XMLHttpRequest();
					}
					else{
				    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.open("GET","../ripx/check.php",true);
					xmlhttp.send(); 
					}, 5000);
</script>