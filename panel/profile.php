<?php 
session_start();

$page = "Team";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	

		
		$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
	$plansql -> execute(array(":id" => $_SESSION['ID']));
	$row = $plansql -> fetch(); 
	$date = date("m-d-Y", $row['expire']);
	if (!$user->hasMembership($odb)){
		$row['mbt'] = 0;
		$row['concurrents'] = 0;
		$row['name'] = 'No membership';
		$date = 'No membership';
	}
	
	
	if(!empty($_POST['update'])){
		
		if(empty($_POST['old']) || empty($_POST['new'])){
				$error = error('You need to enter both passwords.');
		}

		$SQLCheckCurrent = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `ID` = :ID AND `password` = :password");
		$SQLCheckCurrent -> execute(array(':ID' => $_SESSION['ID'], ':password' => SHA1(md5($_POST['old']))));
		$countCurrent = $SQLCheckCurrent -> fetchColumn(0);
	
		if ($countCurrent == 0){
			$error = error('Current password is incorrect.');
		}
		
		$notify = error($error);
	
		if(empty($error)){
			$SQLUpdate = $odb -> prepare("UPDATE `users` SET `password` = :password WHERE `username` = :username AND `ID` = :id");
			$SQLUpdate -> execute(array(':password' => SHA1(md5($_POST['new'])),':username' => $_SESSION['username'], ':id' => $_SESSION['ID']));
			$error = success('Password has been successfully changed');
		}
	
	}
		
?>

<main id="main-container">
  <div class="content">
      <div class="bg-image bg-image-bottom" style="background-image: url('assets/img/photos/photo13@2x.jpg');">
<div class="bg-primary-dark-op py-30">
<div class="content content-full text-center">
<div class="mb-15">
<a class="img-link" href="javascript:void(0)">
<img class="img-avatar img-avatar96 img-avatar-thumb" src="avatar-user.png" alt="">
</a>
</div>

<h1 class="h3 text-white font-w700 tossing mb-10"><i class=""></i> <i class="fa fa-users"></i></h1>
	<?php if (isset($error)) { echo $error; } ?>
<h2 class="h5 text-white-op">
<a href="javascript:void(0)" onclick="ip()" class="h3 font-w700 text-warning">
<i style="padding: 5px;" class=""></i>Welcome: 
<?php echo ucfirst($_SESSION['username']); ?><i style="padding: 5px;" class="flag-icon flag-icon-"></i></a>
Rank: <a class="text-primary-light link-effect" href="javascript:void(0)">	<?php 
								//$checkOnlines = $odb->query("SELECT * FROM `login_history` WHERE `status` = 'success' ORDER BY `id` DESC LIMIT 1;");
									//while($row = $checkOnlines->fetch(PDO::FETCH_BOTH)){
									
										$userInfoData = $odb->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['ID'] . "' LIMIT 1");
										$userInfo = $userInfoData->fetch(PDO::FETCH_BOTH);
											
        $planInfoData = $odb->query("SELECT * FROM `plans` WHERE `id` = '" . $userInfo['membership'] . "'");
        $planInfo = $planInfoData->fetch(PDO::FETCH_BOTH);
		
       if($userInfo['rank'] == 69){
           $rank = '<bb class="text-danger"><strong>😼 Admin</strong></bb>'; 
		   $fotox = '<img src="userpro.gif" alt="user-img" class="img-circle" width="40" height="40"/>'; 
        }  
        elseif($userInfo['rank'] == 15){
           $rank = '<bb style="color: #aa65cc!important;"><strong>💎 Support</strong></bb>'; 
		    $fotox = '<img src="userpro.gif" alt="user-img" class="img-circle" width="40" height="40"/>'; 
        }  		
        elseif($planInfo['vip'] == "1") {
            $rank = '<bb style="color:#0284db;"><strong>💀 VIP User</strong></bb>';
			$fotox = '<img src="avatar-user.png" alt="user-img" class="img-circle" width="40" height="40"/>'; 

        } 
		elseif($userInfo['expire'] > time()) {
            $rank = '<bb class="text-success">&#9889; Paid User</bb>';
			 $fotox = '<img src="usernormal.png" alt="user-img" class="img-circle" width="40" height="40"/>'; 
        }else{
          $rank = '<bb style="color:#d6d7d8;">&#9785; Free User</bb>';  
		   $fotox = '<img src="free.png" alt="user-img" class="img-circle" width="40" height="40"/>'; 
        }
			                              
if ($userInfo['rank'] == 1){
$realIP = "1.3.3.7";    
}    

		echo '
    <tr><td>'.$rank.'</td></tr>
';
	
									//}
?>
</a>
</h2>
<button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" data-toggle="modal" data-target="#modal-updateProfile">
<i class="fa fa-pencil mr-5"></i> Update
</button>
<div class="modal fade" id="modal-updateProfile" tabindex="-1" role="dialog" aria-labelledby="modal-popout" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-dialog-popout" role="document">
<div class="modal-content">
<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-gd-aqua">
<h3 class="block-title"><i class="fa fa-user"></i> Password</h3>
<div class="block-options">
<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
<i class="si si-close"></i>
</button>
</div>
</div>
<div class="block-content">

<div id="statusRespone"></div>


      <form class="form-horizontal push-10-t push-10" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <input class="form-control" type="password" id="old" name="old" placeholder="Enter your old password..">
                                                    
                                                </div>
                                            </div>
											 </div>
											<div class="form-group">											  
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <input class="form-control" type="password" id="new" name="new" placeholder="Enter your new password..">
                                                    
                                                </div>
                                            </div>
                                        </div>                         
                                        <div class="form-group">
                                            <div class="col-xs-12">                                             
												<button class="btn btn-sm btn-danger" name="update" value="change" type="submit">
													<i class="fa fa-plus push-5-r"></i> Change
												</button>
											</div>
                                        </div>
                                    </form>
</br>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
 
</main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      