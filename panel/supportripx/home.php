<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Dashboard";
include 'header.php';


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
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">

<div class="row gutters-tiny js-appear-enabled animated fadeIn" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block animated flipInX">
                                        <i class="si si-fire fa-3x text-danger"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500"><?php echo $TotalAttacks+120000; ?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Attacks</div>
                                </div>
                            </a>
                        </div>
                                                <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block animated flipInX">
                                        <i class="fa fa-server fa-3x text-success"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500"><?php echo $TotalPools; ?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Servers</div>
                                </div>
                            </a>
                        </div>
                                                <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block animated flipInX">
                                        <i class="fa fa-bolt fa-3x text-warning"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500"><?php echo $RunningAttacks; ?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Running Attacks</div>
                                </div>
                            </a>
                        </div>
                                                <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block animated flipInX">
                                        <i class="si si-users fa-3x text-primary"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500"><?php echo $TotalUsers+6000; ?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Users</div>
                                </div>
                            </a>
                        </div>
                                           
                    </div><br>
<div class="row">
<div class="col-lg-12">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-users"></i> Active Tickets xD</h3>
</div>
<div class="block-content block-content-dark">


	 <table class="table table-striped table-bordered table-vcenter">
                                  <thead>
                                      <tr>
                                         <th>Username</th>
                                            <th>Subject</th>
                                            <th>Priority</th>
                                            <th>Department</th>
                                            <th>Last Update</th>
                                             <th>View</th>
                                      </tr>
                                  </thead>   
                                  <tbody>
<?php 
            $SQLGetTickets = $odb -> prepare("SELECT * FROM `tickets` WHERE `status` = :status ORDER BY `id` DESC");
            $SQLGetTickets -> execute(array(':status' => 'Waiting for admin response'));
            while ($getInfo = $SQLGetTickets -> fetch(PDO::FETCH_ASSOC))
            {
                $id = $getInfo['id'];
                $username = $getInfo['username'];
                $subject = $getInfo['subject'];
                $priority = $getInfo['priority'];
                $department = $getInfo['department'];
                                $status = $getInfo['status'];

                $time = date('Y-m-d h:i:s', $getInfo['time']);

          if ($priority == "Low") {
          $priority1 = '<span class="label label-info">Low</span>';
          } elseif ($priority == "Medium") {
          $priority1 = '<span class="label label-warning">Medium</span>';
          } elseif ($priority == "High") {
          $priority1 = '<span class="label label-danger">High</span>';
          
          }


                echo '<tr><td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$username.'</span></td><td><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">'.htmlspecialchars($subject).'</span></td><td><span class="badge badge-primary">'.$priority1.'</span></td><td><span class="badge badge-danger">'.$department.'</span></td><td><span class="badge badge-success">'.$time.'</span></td> <td width="50px"><a href="ticket.php?Ticket&id='.$id.'"><button type="submit" class="btn btn-warning">View</button></a></td></tr>';
            }
            ?>
                
                
                                   </tbody>
                             </table>

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
