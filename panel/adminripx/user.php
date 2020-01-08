<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Settings";
include 'header.php';

		$id = $_GET['id'];

	if(!is_numeric($id)){
		die(error('Invalid type of ID'));
	}
	
	
	
	$SQLGetInfo = $odb -> prepare("SELECT * FROM `users` WHERE `ID` = :id LIMIT 1");
	$SQLGetInfo -> execute(array(':id' => $_GET['id']));
	$userInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
	
	$username = $userInfo['username'];
	$email = $userInfo['email'];
	$rank = $userInfo['rank'];
	$membership = $userInfo['membership'];
	$status = $userInfo['status'];	
	$expire = $userInfo['expire'];	
	$balance = $userInfo['balance'];
	$atime = $userInfo['atime'];
	$aserv = $userInfo['aserv'];
	$aconcu = $userInfo['aconcu'];
	$avip = $userInfo['avip'];
	$apikey = $userInfo['apikey'];
	$code_account = $userInfo['code_account'];
	$lastact = date("m-d-Y, h:i:s a", $userInfo['lastact']);
	$lastlogin = date("m-d-Y, h:i:s a", $userInfo['lastlogin']);
	
	$botnet = $userInfo['botnet'];
	
	$update = false;

   if (isset($_POST['update'])){
	   
	   if ($user -> isAdmin($odb)){
		   
			if ($username!= $_POST['username']){
				if (ctype_alnum($_POST['username']) && strlen($_POST['username']) >= 4 && strlen($_POST['username']) <= 15){
					$SQL = $odb -> prepare("UPDATE `users` SET `username` = :username WHERE `ID` = :id");
					$SQL -> execute(array(':username' => $_POST['username'], ':id' => $id));
					$update = true;
					$username = $_POST['username'];
				}
				else{
					$error = 'Username has to be 4-15 characters in length and alphanumeric';
				}
			}
			
			if (!empty($_POST['password'])){
				$SQL = $odb -> prepare("UPDATE `users` SET `password` = :password WHERE `ID` = :id");
				$SQL -> execute(array(':password' => SHA1(md5($_POST['password'])), ':id' => $id));
				$update = true;
			}
			
			if (!empty($_POST['balance'])){
				$SQL = $odb -> prepare("UPDATE `users` SET `balance` = :balance WHERE `ID` = :id");
				$SQL -> execute(array(':balance' => number_format((float)$_POST['balance'], 2, '.', ''), ':id' => $id));
				$update = true;
				$updateMsg = "Added Balanece: {$_POST['balance']}";
				$balance = number_format((float)$_POST['balance'], 2, '.', '');
			}
			
			if ($email != $_POST['email']){
				if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					$SQL = $odb -> prepare("UPDATE `users` SET `email` = :email WHERE `ID` = :id");
					$SQL -> execute(array(':email' => $_POST['email'], ':id' => $id));
					$update = true;
					$email = $_POST['email'];
				}
				else{
					$error = 'Email is invalid';
				}
			}
			
			if ($rank != $_POST['rank']){
				$SQL = $odb -> prepare("UPDATE `users` SET `rank` = :rank WHERE `ID` = :id");
				$SQL -> execute(array(':rank' => $_POST['rank'], ':id' => $id));
				$update = true;
				$updateMsg = "User rank updated from {$rank} to {$_POST['rank']}";
				$rank = $_POST['rank'];
			}
			
			if ($avip != $_POST['avip']){
				$SQL = $odb -> prepare("UPDATE `users` SET `avip` = :avip WHERE `ID` = :id");
				$SQL -> execute(array(':avip' => $_POST['avip'], ':id' => $id));
				$update = true;
				$avip = $_POST['avip'];
				$updateMsg = "User vip updated to {$avip}";
			}
			
			if ($aserv != $_POST['aserv']){
				$SQL = $odb -> prepare("UPDATE `users` SET `aserv` = :aserv WHERE `ID` = :id");
				$SQL -> execute(array(':aserv' => $_POST['aserv'], ':id' => $id));
				$update = true;
				$aserv = $_POST['aserv'];
				$updateMsg = "User serv updated to {$aserv}";
			}
			
			if ($atime != $_POST['atime']){
				$SQL = $odb -> prepare("UPDATE `users` SET `atime` = :atime WHERE `ID` = :id");
				$SQL -> execute(array(':atime' => $_POST['atime'], ':id' => $id));
				$update = true;
				$atime = $_POST['atime'];
				$updateMsg = "User time updated to {$atime}";
			}
			
			if ($code_account != $_POST['code_account']){
				$SQL = $odb -> prepare("UPDATE `users` SET `code_account` = :code_account WHERE `ID` = :id");
				$SQL -> execute(array(':code_account' => $_POST['code_account'], ':id' => $id));
				$update = true;
				$code_account = $_POST['code_account'];
				$updateMsg = "User code account update to {$code_account}";
			}
			
			if ($aconcu != $_POST['aconcu']){
				$SQL = $odb -> prepare("UPDATE `users` SET `aconcu` = :aconcu WHERE `ID` = :id");
				$SQL -> execute(array(':aconcu' => $_POST['aconcu'], ':id' => $id));
				$update = true;
				$aconcu = $_POST['aconcu'];
			}
			
			if ($apikey != $_POST['apikey']){
				$SQL = $odb -> prepare("UPDATE `users` SET `apikey` = :apikey WHERE `ID` = :id");
				$SQL -> execute(array(':apikey' => $_POST['apikey'], ':id' => $id));
				$update = true;
				$apikey = $_POST['apikey'];
			}
			
			if ($botnet != $_POST['botnet']){
				$SQL = $odb -> prepare("UPDATE `users` SET `botnet` = :botnet WHERE `ID` = :id");
				$SQL -> execute(array(':botnet' => $_POST['botnet'], ':id' => $id));
				$update = true;
				$botnet = $_POST['botnet'];
			}
			
			 
			 
			if ($expire != strtotime($_POST['expire'])){
				$SQL = $odb -> prepare("UPDATE `users` SET `expire` = :expire WHERE `ID` = :id");
				$SQL -> execute(array(':expire' => strtotime($_POST['expire']), ':id' => $id));
				$update = true;
				$updateMsg = "Users expire updated from {$expire} to {$_POST['expire']}";
				$expire = strtotime($_POST['expire']);
			}
			
		
		}
		
		if ($membership != $_POST['plan']){
			
			if ($_POST['plan'] == 0){
				if ($user -> isAdmin($odb)){
					$SQL = $odb -> prepare("UPDATE `users` SET `expire` = '0', `membership` = '0' WHERE `ID` = :id");
					$SQL -> execute(array(':id' => $id));
					$update = true;
					$updateMsg = "User updated to plan: Non";
					$membership = $_POST['plan'];
				}
				else{
					$error = "You cannot remove packages";
				}
			}
			else{
				if ($_POST['plan'] != 85){
					if($user -> isAdmin($odb)){
						$getPlanInfo = $odb -> prepare("SELECT `unit`,`length`,`name` FROM `plans` WHERE `ID` = :plan");
						$getPlanInfo -> execute(array(':plan' => $_POST['plan']));
						$plan = $getPlanInfo -> fetch(PDO::FETCH_ASSOC);
						$unit = $plan['unit'];
						$length = $plan['length'];
						$name = $plan['name'];
						$newExpire = strtotime("+{$length} {$unit}");
						$updateSQL = $odb -> prepare("UPDATE `users` SET `expire` = :expire, `membership` = :plan WHERE `id` = :id");
						$updateSQL -> execute(array(':expire' => $newExpire, ':plan' => $_POST['plan'], ':id' => $id));
						$update = true;
						$updateMsg = "User updated to plan: {$name}";
						$membership = $_POST['plan'];
					}
					else{
						$error = "You cannot give any other package apart from Vouch packages";
					}
				}
				else{
					$getPlanInfo = $odb -> prepare("SELECT `unit`,`length`,`name` FROM `plans` WHERE `ID` = :plan");
					$getPlanInfo -> execute(array(':plan' => $_POST['plan']));
					$plan = $getPlanInfo -> fetch(PDO::FETCH_ASSOC);
					$unit = $plan['unit'];
					$length = $plan['length'];
					$newExpire = strtotime("+{$length} {$unit}");
					$updateSQL = $odb -> prepare("UPDATE `users` SET `expire` = :expire, `membership` = :plan WHERE `id` = :id");					
					$updateSQL -> execute(array(':expire' => $newExpire, ':plan' => $_POST['plan'], ':id' => $id));
					$update = true;
					$updateMsg = "User updated to plan: Vouch";
					$membership = $_POST['plan'];
				}
			}
		}
		if ($update == true){
			$notify = success('User Has Been Updated');
			if(!empty($updateMsg)){
				$actionSQL = $odb->prepare("INSERT INTO `actions` VALUES (NULL,?,?,?,?)");
				$actionSQL->execute(array($_SESSION['username'],$username,$updateMsg,time()));
			}
		} else {
			$notify = error('Nothing has been updated');
		}
		
		if (!empty($error)){
			$notify = error($error);
		}
	}
	
	function selectedR($b, $a){
		if ($a == $b){
			return 'selected="selected"';
		}
	}
	
	
	
		?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
  <?php if (isset($error)) { echo $error; }elseif(isset($notify)) { echo $notify; } ?>
<div class="row">
<div class="col-md-7" data-select2-id="9">
      
                <div class="block block-rounded block-themed" data-select2-id="7">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">User Menu</h3>
                        <div class="block-options">
						<form class="form-horizontal push-10-t" method="post">
                            <button type="submit" name="update" value="do" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-select2-id="6">
             
                                    	
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
											<label for="name">Username</label>
											<input class="form-control" type="text" id="name" name="username" value="<?php echo htmlspecialchars($username); ?>">
											
										</div>
									</div>
								</div> 
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
											<label for="email">Email</label>
											<input class="form-control" type="email" id="email" name="email" value="<?php echo $email; ?>">
											
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
											<label for="price">New Password</label>
											<input class="form-control" type="password" id="price" placeholder="Leave empty to keep the same" name="password">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
										<label for="private">Rank</label>
											<select class="form-control" id="private" name="rank">
												<option value="69" <?php echo selectedR(69, $rank); ?> >Administrator</option>
												<option value="15" <?php echo selectedR(15, $rank); ?> >Support</option>
												<option value="0" <?php echo selectedR(0, $rank); ?> >User</option>
											</select>
											
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
										<label for="plan">Membership</label>
											<select class="form-control" id="plan" name="plan" >
												<option value="0">No Membership</option>	
												<?php 
												$SQLGetMembership = $odb -> query("SELECT * FROM `plans`");
												while($memberships = $SQLGetMembership -> fetch(PDO::FETCH_ASSOC)){
													$mi = $memberships['ID'];
													$mn = $memberships['name'];
													echo '<option value="'.$mi.'" '. selectedR($mi, $membership) .'>'.$mn.'</option>';
												}
												?>
											</select>
											
										</div>
									</div>
								</div>
								
								<div class="form-group has-danger">
													<label for="aserv">Addons ViP</label>
											<select  class="form-control form-control-danger" id="avip" name="avip" >
						                        <option value="0" <?php echo selectedR(0, $avip); ?> >No</option>
						 						<option value="1" <?php echo selectedR(1, $avip); ?> >Yes</option>
											</select>
                                          </div>
											
											
								<div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Addons Concurrent</label>
                                                <input  type="text" id="name" placeholder="Addons Plans Concurrents" name="aconcu" value="<?php echo htmlspecialchars($aconcu); ?>"class="form-control form-control-warning" >
                                            </div>
								<div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Api Key</label>
                                                <input  type="text" id="name" placeholder="Addons Plans Concurrents" name="apikey" value="<?php echo htmlspecialchars($apikey); ?>"class="form-control form-control-warning" >
                                </div>
								<div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Botnet</label>
                                                <input  type="text" id="name" placeholder="Botnet access" name="botnet" value="<?php echo htmlspecialchars($botnet); ?>"class="form-control form-control-warning" >
                                </div>
							<div class="form-group has-success">
                                                <label class="form-control-label" for="inputSuccess1">Addons Time</label>
                                                <input  type="text" id="name" placeholder="Addons Plans Time" name="atime" value="<?php echo htmlspecialchars($atime); ?>" class="form-control form-control-success" >
                                            </div>
											
											<div class="form-group has-danger">
													<label for="aserv">Addons Servers</label>
											<select  class="form-control form-control-danger" id="aserv" name="aserv" >
												<option value="0" <?php echo selectedR(0, $aserv); ?> >Ninguno</option>
												<option value="1" <?php echo selectedR(1, $aserv); ?> >1</option>
												<option value="2" <?php echo selectedR(2, $aserv); ?> >2</option>
												<option value="3" <?php echo selectedR(3, $aserv); ?> >3</option>
												<option value="4" <?php echo selectedR(4, $aserv); ?> >4</option>
												<option value="5" <?php echo selectedR(5, $aserv); ?> >5</option>
											</select>
                                            </div>
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
										<label for="status">Status</label>
											<select class="form-control" id="status" name="status" >
												<option value="0" <?php echo selectedR(0, $status); ?> >Active</option>
												<option value="1" <?php echo selectedR(1, $status); ?> >Banned</option>
											</select>
											
										</div>
									</div>
								</div>
							    <div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
											<label for="name">Reason</label>
											<input class="form-control" type="text" id="name" name="reason">
										
										</div>
									</div>
								</div> 
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
										<label for="balance">Balance</label>
											<input class="form-control" type="text" id="balance" name="balance" value="<?php echo number_format((float)$balance, 2, '.', ''); ?>">
											
										</div>
									</div>
								</div> 
								<div class="form-group row">
									<div class="col-sm-12">
										<div class="form-material">
										<label for="expire">Expiration Date</label>
											<input class="form-control" type="text" id="expire" name="expire" value="<?php echo date("d-m-Y", $expire); ?>">
											
										</div>
									</div>
								</div> 
								<div class="form-group row">
									<div class="col-sm-9">
										<button name="update" value="do" class="btn btn-sm btn-primary" type="submit">Submit</button>
									</div>
								</div>
							
                    </div>
                </div>
           
        </div>
		<div class="col-md-5">
      
                <div class="block block-rounded block-themed">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title"> RiPxSystems is the best :) </h3>
                    </div>
                    <div class="block-content block-content-full">
                                <div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Api Key</label>
                                                <input  type="text" id="name" placeholder="Api Key" name="apikey" value="<?php echo htmlspecialchars($apikey); ?>"class="form-control form-control-warning" >
                                </div>
								
                                <div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Security Code</label>
                                                <input  type="text" id="name" placeholder="Addons Plans Concurrents" name="code_account" value="<?php echo htmlspecialchars($code_account); ?>"class="form-control form-control-warning" >
                                </div>
								
								<div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Last Loggin</label>
                                                <input  type="text" style=" background-color: #212529; opacity: 1;" id="name" placeholder="Addons Plans Concurrents" name="lastlogin" value="<?php echo htmlspecialchars($lastlogin); ?>"class="form-control form-control-warning" disabled>
                                </div>
								
								<div class="form-group has-warning">
                                                <label class="form-control-label" for="inputSuccess1">Last Active</label>
                                                <input  type="text" style=" background-color: #212529; opacity: 1;" id="name" placeholder="Addons Plans Concurrents" name="lastact" value="<?php echo htmlspecialchars($lastact); ?>"class="form-control form-control-warning" disabled>
                                </div>
                    </div>
                </div>
            </form>
        </div>
		
</div>
</div>

<!-- END Main Container -->
        </div>
    </main>
	
<script>
	SendPop = setTimeout(function(){
		document.getElementById('modal-popout').click();
		clearTimeout(SendPop);
	}, 2500);
</script>
<script>
	SendPop = setTimeout(function(){
		document.getElementById('modal-popGift').click();
		clearTimeout(SendPop);
	}, 5000);
</script>
<div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-labelledby="modal-popout" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-dialog-popout" role="document" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="modal-content">
<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
<h3 class="block-title"><i class="fa fa-exclamation-triangle"></i> ALERT</h3>
<div class="block-options">
<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
<i class="si si-close"></i>
</button>
</div>
</div>
<div class="block-content">
Dear <strong><?php echo ucfirst($_SESSION['username']); ?></strong><br><br><p>You can see many systems has been added!<br></p><hr>UserProfile, ApiAccess, Last Logins + Users online,Servers Per Attack, Graph 7 Days Attacks <br>
<span class="badge badge-danger">HOT</span> <bb class="text-warning">Bot System </bb>(<bb class="text-danger">ON!</bb>)<br><br>
<bb class="text-success">Now you can pay to plans with your account balance!</bb><br><hr><span class="badge badge-danger">HUB</span> <bb class="text-warning">Stresser Hub </bb>(<bb class="text-success">ON!!</bb>)<br><p></p></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      <script type="text/javascript">
 !function($) {
	"use strict";

	var VectorMap = function() {
	};

	VectorMap.prototype.init = function() {
		//various examples
				  $('#world-mapx').vectorMap(
{
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: '#353C48',
    regionStyle : {
        initial : {
          fill : '#1583ea'
        }
      },
    markerStyle: {
      initial: {
                    r: 9,
                    'fill': '#fff',
                    'fill-opacity':1,
                    'stroke': '#000',
                    'stroke-width' : 5,
                    'stroke-opacity': 0.4
                },
                },
    enableZoom: true,
    hoverColor: '#009efb',
    markers : [
 <?php
            $SQLSelect = $odb->query("SELECT `ip` FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 ORDER BY `id` DESC");
            while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
                $ipAttack = $show['ip'];


                if (!filter_var($ipAttack, FILTER_VALIDATE_IP) === false) {

                $geolocation = ip2geolocation($ipAttack);
                $geolocation->latitude;
                $geolocation->longitude;
                $geolocation->longitude;
                $ipOctets = explode('.', $ipAttack);
                $ipnew = $ipOctets[0] . '.' . $ipOctets[1] . '.' . preg_replace('/./', '*', $ipOctets[2]) . '.' . preg_replace('/./', '*', $ipOctets[3]);

                }
                else
                {
                    // remove http://
                    $url = preg_replace('#^https?://#', '', $ipAttack);
                    $url = preg_replace('#^http?://#', '', $ipAttack);

                    $ipnew = gethostbyname($url);
                    $geolocation = ip2geolocation($ipnew);
                    $geolocation->latitude;
                    $geolocation->longitude;
                    $geolocation->longitude;

                    $ipOctets = explode('.', $ipnew);
                    $ipnew = $ipOctets[0] . '.' . $ipOctets[1] . '.' . preg_replace('/./', '*', $ipOctets[2]) . '.' . preg_replace('/./', '*', $ipOctets[3]);

                }




                echo  "{latLng: [".$geolocation->latitude.", ".$geolocation->longitude."], name: '".$ipnew."'},\n";
            }

          ?>

            {latLng: [, ], name: ''}
            ]
		});


		$('#uk').vectorMap({
			map : 'uk_mill_en',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});

		$('#usa').vectorMap({
			map : 'us_aea_en',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});


		$('#australia').vectorMap({
			map : 'au_mill',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});
		
		
		$('#canada').vectorMap({
			map : 'ca_lcc',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});
		

	},
	//init
	$.VectorMap = new VectorMap, $.VectorMap.Constructor =
	VectorMap
}(window.jQuery),

//initializing
function($) {
	"use strict";
	$.VectorMap.init()
}(window.jQuery);
</script> 
