<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Blacklist";
include 'header.php';


if (isset($_POST['deleteblacklist'])){
		$delete = $_POST['deleteblacklist'];
		$SQL = $odb -> query("DELETE FROM `blacklist` WHERE `ID` = '$delete'");
		$notify = success('Blacklist has been removed');
	}
	
	if (isset($_POST['addblacklist'])){
	
		if (empty($_POST['value'])){
			$error = error('Please verify all fields');
		}

		$value = $_POST['value'];
		$type = $_POST['type'];

		if (empty($error)){	
			$SQLinsert = $odb -> prepare("INSERT INTO `blacklist` VALUES(NULL, :value, :type)");
			$SQLinsert -> execute(array(':value' => $value, ':type' => $type));
			$notify = success('Blacklist has been added');
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
<div class="col-lg-5">
<div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-ban"></i> Blacklist</h3>
</div>
<div class="block-content block-content-dark">
<form class="form-horizontal push-10-t" method="post">
							<div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="name">Value</label>
										<input class="form-control" type="text" id="name" name="value">
										
									</div>
								</div>
							</div> 
							<div class="form-group">
								<div class="col-sm-12">
									<div class="form-material">
									<label for="type">Type</label>
										<select class="form-control" id="type" name="type" size="1">
											<option value="victim">Host</option>
										</select>
										
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-9">
									<button name="addblacklist" value="do" class="btn btn-sm btn-primary" type="submit">Submit</button>
								</div>
							</div>
						</form>
						</div></div></div>
						<div class="col-lg-7">
<div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-ban"></i> Blacklist</h3>
</div>
<div class="block-content block-content-dark">
		<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
						<tr>
							<th style="font-size: 12px;">Value</th>
							<th style="font-size: 12px;">Type</th>
							<th style="font-size: 12px;">Delete</th>
						</tr>
						<tr>
							<form method="post">
								<?php
								$SQLGetMethods = $odb -> query("SELECT * FROM `blacklist`");
								while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
									$id = $getInfo['ID'];
									$value = $getInfo['data'];
									$type = $getInfo['type'];
									echo '<tr>
											<td style="font-size: 12px;"><strong><span class="badge badge-primary">'.htmlspecialchars($value).'</span></strong></td>
											<td style="font-size: 12px;"><strong><span class="badge badge-danger">'.htmlspecialchars($type).'</span></strong></td>
											<td style="font-size: 12px;"><button name="deleteblacklist" value="'.$id.'" class="btn btn-warning btn-sm"><i class="fa fa-trash-o"></i></button></td>
										</tr>';
								}
								if(empty($SQLGetMethods)){
									echo error('No Blacklists');
								}
								?>
							</form>
						</tr>                                       
					</table>
						</div></div></div>
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
