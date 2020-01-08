<?php 
session_start();
$page = "API";
include 'header.php';

if (isset($_POST['delete'])){
	
	if($_SESSION['username'] == "RootSec"){								
		//EASY SECURITY RIPX						
		}else{
		$error = error('only RootSec can delete the methods ;) ');
		}
		if (empty($error)){
		$delete = $_POST['delete'];
		$SQL = $odb -> prepare("DELETE FROM `methods` WHERE `id` = :id");
		$SQL -> execute(array(':id' => $delete));
		$notify = success('The method has been deleted');
	}
	}
	
	if (isset($_POST['addmethod'])){
		if (empty($_POST['name']) || empty($_POST['fullname']) || empty($_POST['type'])){
			$notify = error('Please verify all fields');
		}
		else{
			$name = $_POST['name'];
			$fullname = $_POST['fullname'];
			$type = $_POST['type'];
			$SQLinsert = $odb -> prepare("INSERT INTO `methods` VALUES(NULL, :name, :fullname, :type)");
			$SQLinsert -> execute(array(':name' => $name, ':fullname' => $fullname, ':type' => $type));
			$notify = success('Method has been added');
		}
	}	
	
	// API/Server 
	if (isset($_POST['deleteapi'])){
		
		if($_SESSION['username'] == "RootSec"){								
		//EASY SECURITY RIPX						
		}else{
		$error = error('only RootSec can delete the apis');
		}
									
		if (empty($error)){
		$delete = $_POST['deleteapi'];
		$SQL = $odb -> prepare("DELETE FROM `api` WHERE `id` = :id");
		$SQL -> execute(array(':id' => $delete));
		$notify = success('API has been removed');
		}
	
	}
	
	if (isset($_POST['onlineapi'])){
		$status = $_POST['onlineapi'];
		$SQL = $odb -> prepare("UPDATE `api` SET `status`='1' WHERE `id` = :id");
		$SQL -> execute(array(':id' => $status));
		$notify = success('Online Api Success');
	}
	
    if (isset($_POST['offlineapi'])){
		$status = $_POST['offlineapi'];
		$SQL = $odb -> prepare("UPDATE `api` SET `status`='0' WHERE `id` = :id");
		$SQL -> execute(array(':id' => $status));
		$notify = success('Offline Api Success');
	}
	
	if (isset($_POST['deleteserver'])){
		$delete = $_POST['deleteserver'];
		$SQL = $odb -> prepare("DELETE FROM `servers` WHERE `id` = :id");
		$SQL -> execute(array(':id' => $delete));
		$notify = success('Server has been removed');
	}
	
	if (isset($_POST['addapi'])){
		
		if (empty($_POST['api']) || empty($_POST['name']) || empty($_POST['money']) || empty($_POST['methods'])){
			$error = error('Please verify all fields');
		}
		
		$api = $_POST['api'];
		$name = $_POST['name'];
		$slots = $_POST['money'];
		$vip = $_POST['vip'];
		$status = $_POST['status'];
		$methods = implode(" ",$_POST['methods']);
		
		if (!(is_numeric($slots))){
			$error = error('Slots field has to be numeric');
		}
		
$parameters = array("[host]", "[port]", "[time]", "[method]");
		foreach ($parameters as $parameter){
			if (strpos($api,$parameter) == false){
				$error = 'Could not find parameter "'.$parameter.'"';
			}
		}
			
		if (empty($error)){
			$SQLinsert = $odb -> prepare("INSERT INTO `api` VALUES(NULL, :name, :api, :slots, :methods, :vip, :status, :lastUsed, :lastip)");
			$SQLinsert -> execute(array(':api' => $api, ':name' => $name, ':slots' => $slots, ':methods' => $methods, ':vip' => $vip, ':status' => $status, ':lastUsed' => '0', ':lastip' => '1.2.3.4'));
			$notify = success('API has been added');
		}
		else{
			$notify = error($error);
		}
	}	
?>

<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
<?php if (isset($error)) { echo $error; }elseif(isset($notify)) { echo $notify; } ?>
<div class="row">
<div class="col-lg-12">
<div class="block block-rounded block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-gd-primary">
<h3 style="color: white;" class="block-title"><i class="fa fa-bolt"></i> API</h3>
</div>
<div class="block-content block-content-dark">
<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">Name</th>
                                            <th>#ID</th>
											<th>API URL</th>
                                            <th>Slots</th>
											<th>Network</th>
                                            <th>Methods</th>
                                            <th>Status</th>
											<th>turn off api</th>
											<th>turn on api</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                   <tr>
<form method="post">
							<?php
								$SQLGetMethods = $odb -> query("SELECT * FROM `api`");
								while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
									 $id = $getInfo['id'];
									 $api = $getInfo['api'];
									 $name = $getInfo['name'];
									 $slots = $getInfo['slots'];
									 $methods = $getInfo['methods'];
									 $status = $getInfo['status'];
									 $vip = $getInfo['vip'];
									
									if($vip == "0")
									{
										$vip = '<button type="button" class="btn btn-outline btn-danger btn-circle"><i class="fa fa-times"></i> </button>';
									}
									elseif($vip == "1")
									{
										$vip = '<button type="button" class="btn btn-outline btn-success btn-circle"><i class="fa fa-check"></i> </button>';
									}
									else
									{
										$vip = '<button type="button" class="btn btn-outline btn-primary btn-circle"><i class="fa fa-bolt"></i> </button>';
									}
									    if($status == "0")
									{
										$status = '<b style="font-size:19pt;color:orange;"><i class="fa fa-exclamation-triangle"></i></b>';
									}
									
							        if($status == "1")
									{
										$status = '<b style="font-size:19pt;color:green;"><i class="fa fa-signal"></i></b>';
									}
									
									if($_SESSION['username'] == "RootSec"){
										
								     $apisecurity = ' '.htmlspecialchars($api).' ';
									
									}else{
								    $apisecurity = ' <span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">only RootSec can see api links</span> ';
									}
									 echo '<tr>
									           <td style="font-size: 12px;"><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">'.($id).'</span></td>
												<td style="font-size: 12px;"><strong><span class="badge badge-primary">'.htmlspecialchars($name).'</span></strong></td>
												<td style="font-size: 12px;" width="20%">'.$apisecurity.'</td>
												<td style="font-size: 12px;">'.htmlspecialchars($slots).'</td>
												<td style="font-size: 12px;">'.($vip).'</td>
												<td style="font-size: 12px;">'.htmlspecialchars($methods).'</td>
												<td>'.$status.'</td>
												<td style="font-size: 12px;"><button type="submit" title="Offline Api" name="offlineapi" value="'.htmlspecialchars($id).'" class="btn btn-success"><i class="fa fa-ban"></i></button></td>
												<td style="font-size: 12px;"><button type="submit" title="Online Api" name="onlineapi" value="'.htmlspecialchars($id).'" class="btn btn-primary"><i class="fa fa-bolt"></i></button></td>
												<td style="font-size: 12px;"><button type="submit" title="Delete API" name="deleteapi" value="'.htmlspecialchars($id).'" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
											</tr>';
								}
							?>
							</form>
                                 </tr>
            </table></div></div></div>
			

		
		<div class="col-md-6" data-select2-id="9">
            <form class="form-horizontal push-10-t" method="post">
                <div class="block block-rounded block-themed" data-select2-id="7">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title"> Add Api</h3>
                        <div class="block-options">
                            <button type="submit" name="addapi" value="do" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-select2-id="6">
             
                                <div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="name">Api Name</label>
										<input class="form-control" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="name" name="name" placeholder="Api Name">
										
									</div>
								</div>
							</div> 
							<div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="api">API LINK</label>
										<input class="form-control" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="api" name="api" placeholder="http://stfu-skid.com/api.php?key=keyhere&target=[host]&port=[port]&time=[time]&method=[method]">
									</div>
								</div>
							    </div>
							    <div class="form-group">
								<div class="col-sm-12">
                                <label class="control-label">Slots </label>
                                <input id="money" type="text" value="1" name="money" data-bts-min="1" data-bts-max="150" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-primary btn-trans waves-effect w-md waves-info m-b-5" data-bts-button-up-class="btn btn-success"> 
                                </div> </div>
								<div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="methods">UDP Methods</label>
										<select class="form-control" style="border-color: #0487f9; border-radius: 3px;" id="methods" name="methods[]" size="6" multiple>
											<?php
											$SQLGetMethods = $odb -> query("SELECT * FROM `methods` WHERE `type` = 'udp' ORDER BY `id` ASC");
											while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
												$name = $getInfo['name'];
												echo '<option value="'.$name.'">'.$name.'</option>';
											}
											?>
										</select>
										
									</div>	<div class="form-material">
									<label for="methods">TCP Methods</label>
										<select class="form-control" style="border-color: #0487f9; border-radius: 3px;" id="methods" name="methods[]" size="6" multiple>
											<?php
											$SQLGetMethods = $odb -> query("SELECT * FROM `methods` WHERE `type` = 'tcp' ORDER BY `id` ASC");
											while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
												$name = $getInfo['name'];
												echo '<option value="'.$name.'">'.$name.'</option>';
											}
											?>
										</select>
										
									</div>
									<br><div class="form-material">
									<label for="methods">VIP Methods</label>
										<select class="form-control" style="border-color: #0487f9; border-radius: 3px;" id="methods" name="methods[]" size="6" multiple>
											<?php
											$SQLGetMethods = $odb -> query("SELECT * FROM `methods` WHERE `type` = 'vips' ORDER BY `id` ASC");
											while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
												$name = $getInfo['name'];
												echo '<option value="'.$name.'">'.$name.'</option>';
											}
											?>
										</select>
										
									</div>
						            <br>
									<div class="form-material">
									<label for="methods">All Methods</label>
										<select class="form-control" style="border-color: #0487f9; border-radius: 3px;" id="methods" name="methods[]" size="6" multiple>
											<?php
											$SQLGetMethods = $odb -> query("SELECT * FROM `methods`");
											while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
												$name = $getInfo['name'];
												echo '<option value="'.$name.'">'.$name.'</option>';
											}
											?>
										</select>
										
									</div>
								</div>
							</div>
							<div class="form-group">
                                            <div class="col-sm-12">
												 <label for="vip">Network</label>
                                                    <select class="form-control" id="vip" name="vip" size="1">
                                                        <option value="0">Normal</option>
									              	    <option value="1">ViP</option>
											            
                                                    </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="col-sm-12">
												 <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status" size="1">
                                                        <option value="1">Online</option>
									              	    <option value="0">Offline</option>
														<option value="2">Maintence</option>
                                                    </select>
                                            </div>
                                        </div>
                    </div>
                </div>
            </form>
        </div>
		<div class="col-lg-6">
<div class="block block-rounded block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-gd-primary">
<h3 style="color: white;" class="block-title"><i class="fa fa-bolt"></i> API</h3>
</div>
<div class="block-content block-content-dark">
<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">Name</th>
                                            <th class="text-center" style="width: 50px;">Tag</th>
											<center><th  style="width: 20px;">Delete</th></center>
                                        </tr>
                                    </thead>
                                   <tr>
<form method="post">
						<?php
								$SQLGetMethods = $odb -> query("SELECT * FROM `methods`");
								while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
									$id = $getInfo['id'];
									$name = $getInfo['name'];
									$fullname = $getInfo['fullname'];
									$type = $getInfo['type'];
									echo '<tr>
											<td style="font-size: 12px;">'.htmlspecialchars($name).'</td>
											<td style="font-size: 12px;">'.htmlspecialchars($fullname).'</td>
											<td style="font-size: 12px;"><button name="delete" value="'.$id.'" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></td>
										</tr>';
								}
								if(empty($SQLGetMethods)){
									echo error('No methods');
								}
								?>
							</form>
                                 </tr>
            </table></div></div></div>
			
			
			
			
			<div class="col-md-6" data-select2-id="9">
            <form class="form-horizontal push-10-t" method="post">
                <div class="block block-rounded block-themed" data-select2-id="7">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">General Settings</h3>
                        <div class="block-options">
                            <button type="submit" name="addmethod" value="do" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-select2-id="6">
             
                                       <div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="name">Name</label>
										<input class="form-control" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="name" name="name" placeholder="Hub Name">
										
									</div>
								</div>
							</div> 
							<div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="fname">Tag Name</label>
										<input class="form-control" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="fname" name="fullname" placeholder="Real Name">
										
									</div>
								</div>
							</div>
							
							
							<div class="form-group">
                                            <div class="col-sm-12">
												 <label for="attacktype">Layer Type</label>
                                                    <select class="form-control" id="attacktype" name="type" size="1">
                                                        <option value="layer4">Layer 4</option>
									              	    <option value="layer7">Layer 7</option>
											            <option value="vips">VIP</option>
											            <option value="udp">UDP</option>
											            <option value="ovhgam">OVHGAME</option>
											            <option value="tcp">TCP</option>
                                                    </select>
                                            </div>
                                        </div>
                    </div>
                </div>
            </form>
        </div>
			
			
			
		
		
        </div>
    </div>

</div>
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
