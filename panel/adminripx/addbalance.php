<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "AttackLogs";
include 'header.php';

    if (isset($_POST['pending'])){
		$status = $_POST['pending'];
		$SQL = $odb -> prepare("UPDATE `addbalance` SET `status`='0' WHERE `id` = :id");
		$SQL -> execute(array(':id' => $status));
	}
	if (isset($_POST['canceled'])){
		$status = $_POST['canceled'];
		$SQL = $odb -> prepare("UPDATE `addbalance` SET `status`='1' WHERE `id` = :id");
		$SQL -> execute(array(':id' => $status));
	}
    if (isset($_POST['completed'])){
		$status = $_POST['completed'];
		$SQL = $odb -> prepare("UPDATE `addbalance` SET `status`='2' WHERE `id` = :id");
		$SQL -> execute(array(':id' => $status));
	}
	
	
?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
<div class="row">
<div class="col-lg-12">
<div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-ban"></i> Blacklist</h3>
</div>
<div class="block-content block-content-dark">
<form method="post">
		<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
						<thead>
								<tr>
									 <th  style="font-size: 12px;">Username</th>
                                   <th  style="font-size: 12px;">My Email</th>
                                   <th  style="font-size: 12px;">Method</th>
                                   <th  style="font-size: 12px;">Date</th>
                                   <th  style="font-size: 12px;">Status</th>
								  <th  style="font-size: 12px;">pending</th>
								  <th  style="font-size: 12px;">canceled</th>
								  <th  style="font-size: 12px;">completed</th>
								 
								</tr>
							</thead>
							<tbody style="font-size: 12px;">
							<?php
							$SQLGetLogs = $odb -> query("SELECT * FROM `addbalance` ORDER BY `date` DESC LIMIT 100000");
							while($show = $SQLGetLogs -> fetch(PDO::FETCH_ASSOC)){
								        $id = $show['id'];
										$username = $show['username'];
                                        $myemail = $show['email'];
                                        $method = $show['method'];
                                        $date =  $show['date'];  
										
										 if($show['status'] == '0') {
	                                     	$statusPayment = '<span class="badge badge-warning">Pending</span>';
		                                 } elseif($show['status'] == '1') {
	                                      	$statusPayment = '<span class="badge badge-danger">Canceled</span>';
		                                 } elseif($show['status'] == '2') {
		                                  	$statusPayment = '<span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">Completed!</span>';
	                                     }
	 
                                         echo '<tr>
                                         <td><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;"> '.$username.'</span></td>
                                         <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$myemail.'</span></td>
                                         <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> '.$method.'</span></td>
                                         <td>'.date("d-m-Y, h:i:s a", $date).'</td>
                                         <td>'.$statusPayment.'</td>
										 		<td style="font-size: 12px;"><button type="submit" title="pending" name="pending" value="'.htmlspecialchars($id).'" class="btn btn-warning"><i class="fa fa-ban"></i></button></td>
												<td style="font-size: 12px;"><button type="submit" title="canceled" name="canceled" value="'.htmlspecialchars($id).'" class="btn btn-danger"><i class="fa fa-bolt"></i></button></td>
												<td style="font-size: 12px;"><button type="submit" title="completed" name="completed" value="'.htmlspecialchars($id).'" class="btn btn-success"><i class="fa fa-bolt"></i></button></td>
                                         </tr>';
							}
							?>	
							</tbody>                                    
					</table>
					</form>
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
