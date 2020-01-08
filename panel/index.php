<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Dashboard";
include 'header.php';
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
<div class="col-lg-8">
<div class="block block-themed animated zoomIn">
<div class="block-header bg-flat">
<h3 style="color: white;" class="block-title"><i class="fa fa-bullhorn"></i> Latest News</h3>
</div>
<div class="block-content block-content-dark">
<ul class="list list-timeline list-timeline-modern pull-t">

	<?php 
							$SQLGetNews = $odb -> query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 4");
							while ($getInfo = $SQLGetNews -> fetch(PDO::FETCH_ASSOC)){
								$id = $getInfo['ID'];
								$title = $getInfo['title'];
							     $color = $getInfo['color'];

							    $icon = $getInfo['icon'];
								$content = $getInfo['content'];
								$date = date("m-d-Y, h:i:s a" ,$getInfo['date']);
								echo '
									  
									  
									  <li>
									  <div class="list-timeline-time">Posted By <span class="badge badge-danger">ADMIN</span></div>
<i class="list-timeline-icon '.$icon.' '.$color.'"></i>
<div class="list-timeline-content">
<p class="font-w700" style="background-color: transparent; text-shadow: 1px 1px 2px #409ce7;"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">Bootme </span> '.htmlspecialchars($title).'</p>
<p>'.htmlspecialchars($content).'</p>
</div>
</li>
';
							}
							?>
</ul>
</div>
</div>
</div>
 <?php
				 
				 //Addons Time
			$SQL = $odb->prepare("SELECT `atime` FROM `users` WHERE `users`.`ID` = :id");
			$SQL ->execute(array(':id' => $_SESSION['ID']));
			$atime = $SQL -> fetchColumn(0);
		//Fin Addons Time
			 
			 //Addons Concurrent
			 	$SQL = $odb->prepare("SELECT `aconcu` FROM `users` WHERE `users`.`ID` = :id");
			$SQL ->execute(array(':id' => $_SESSION['ID']));
			$aconcu = $SQL -> fetchColumn(0);
			 //Addons Concurrent
			 
			 //Addons Servers
			$SQL = $odb->prepare("SELECT `aserv` FROM `users` WHERE `users`.`ID` = :id");
			$SQL ->execute(array(':id' => $_SESSION['ID']));
			$aserv = $SQL -> fetchColumn(0);
		    //Fin Addons Servers
			
			$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
			$plansql -> execute(array(":id" => $_SESSION['ID']));
			$row = $plansql -> fetch(); 
			$date = date("d-m-Y, h:i:s a", $row['expire']);
			if (!$user->hasMembership($odb)){
				$row['mbt'] = 0;
				$row['concurrents'] = 0;
				$row['name'] = 'No membership';
				$date = '0-0-0';
			}
	
				    $SQLGetTime = $odb->prepare("SELECT `plans`.`api` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = :id");
				    $SQLGetTime->execute(array(
				        ':id' => $_SESSION['ID']
				    ));
				    $api = $SQLGetTime->fetchColumn(0);
				    if ($api == "0") {
				    	// no api
				    	$api = '<font color="red">No</font>';
				    } else {
				    	$api = '<font color="green">Yes</font>';
				    }
               
			   //Addons ViP
		$SQL = $odb->prepare("SELECT `avip` FROM `users` WHERE `users`.`ID` = :id");
			$SQL ->execute(array(':id' => $_SESSION['ID']));
			$avip = $SQL -> fetchColumn(0);
			 //Addons ViP

				    $SQLGetTime = $odb->prepare("SELECT `plans`.`vip` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = :id");
				    $SQLGetTime->execute(array(':id' => $_SESSION['ID']));
				    $vip = $SQLGetTime->fetchColumn(0)+$avip;
				    if ($vip == "0") {
			
				    	$vip = '<font color="red">No</font>';
				    } 
					if ($vip == "1") {
			
				    	$vip = '<font color="green">Yes</font>';
				    } 
				     if ($vip == "2") {
			
				    	$vip = '<font color="green">Yes</font>';
				    } 
					
					
					$SQLGetTime = $odb->prepare("SELECT `plans`.`totalservers` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = :id");
				    $SQLGetTime->execute(array(
				        ':id' => $_SESSION['ID']
				    ));
				    $totalservers = $SQLGetTime->fetchColumn(0);
                  ?>
<div class="col-lg-4">
            <div class="block block-themed text-center" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-content block-content-full block-sticky-options pt-30 bg-primary-dark" >
                    <img class="img-avatar img-avatar-thumb" src="avatar-user.png" alt="">
                </div>
                <div class="block-content block-content-full block-content-sm bg-primary">
                    <div class="font-w600 text-white mb-5"><?php echo ucfirst($_SESSION['username']); ?></div>
                    <div class="font-size-sm text-white-op">Plan: <?php echo $row['name']; ?></div>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-6">
                            <div class="mb-5"><i class="fa fa-bolt fa-2x text-danger"></i></div>
                            <div class="font-size-sm text-muted">Seconds: <?php echo $row['mbt']+$atime; ?></div>
                        </div>
                        <div class="col-6">
                            <div class="mb-5"><i class="fa fa-fire fa-2x text-primary"></i></div>
                            <div class="font-size-sm text-muted">Concurrents: <?php echo $row['concurrents']+$aconcu; ?></div>
                        </div>
                    </div>
                </div>
				    <div class="block-content">
                    <div class="row items-push">
                        <div class="col-6">
                            <div class="mb-5"><i class="fa fa-clock-o fa-2x text-warning"></i></div>
                            <div class="font-size-sm text-muted">Expire Date: <?php echo $date; ?></div>
                        </div>
                        <div class="col-6">
                            <div class="mb-5"><i class="fa fa-money fa-2x text-success"></i></div>
                            <div class="font-size-sm text-muted">Balance: $<?php echo number_format((float)$balance, 2, '.', ''); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<div class="col-lg-6">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-gd-emerald">
                <h3 class="block-title"><i class="fa fa-history"></i>  Last Logins</h3>
            </div>
<div class="block-content block-content-dark">


	 <table class="table table-striped table-bordered table-vcenter">
                                  <thead>
                                      <tr>
                                         <th class="text-center" style="font-size: 12px;">Status</th>
                                            <th class="text-center" style="font-size: 12px;">Username</th>
                                            <th class="text-center" style="font-size: 12px;">Rank</th>
                                            <th class="text-center" style="font-size: 12px;">Logged In</th>
                                            <th class="text-center" style="font-size: 12px;">IP</th>
                                             <th class="text-center" style="font-size: 12px;">Plataform</th>
                                      </tr>
                                  </thead>   
                                   <tbody id="getLastLogins">
	  

    </tbody>
                             </table>

</div>
</div>
</div>
	<div class="col-lg-6">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-gd-emerald">
                <h3 class="block-title"><i class="fa fa-server"></i>  Last Servers</h3>
            </div>
<div class="block-content block-content-dark">


					<div id="live_servers"></div>


</div>
</div>
</div>
	<div class="col-lg-6">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-gd-emerald">
                <h3 class="block-title"><i class="fa fa-bolt"></i>  Best 8 Methods </h3>
            </div>
<div class="block-content block-content-dark">

	<table class="table table-striped table-bordered table-vcenter">
	<thead>
        <tr>
			<th class="text-center" style="font-size: 12px;">Method</th>
			<th class="text-center" style="font-size: 12px;">Attacks</th>
			<th class="text-center" style="font-size: 12px;">Percentage</th>
        </tr>
	</thead>
    <tbody>
	
       <?php
	   
        $SQLGetMethods = $odb -> query("SELECT * FROM `logs`");
        $metodos_limit = 0;
        while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
         if (!(isset($Metodos[$getInfo['method']]))) {
          $Metodos[$getInfo['method']] = 0;
         }
         $Metodos[$getInfo['method']] = $Metodos[$getInfo['method']] + 1;
        }
        asort($Metodos);
        $Metodos = array_reverse($Metodos);
        $Metodos = array_slice($Metodos, 0, 8, true);

        $Total = 0;


        foreach ($Metodos as $key => $value) {
         $Total = $Total + $value;
        }

        function get_percentage($total, $number)
        {
          if ( $total > 0 ) {
           return round($number / ($total / 100),2);
          } else {
            return 0;
          }
        }



        foreach ($Metodos as $key => $value) {
         $Porcentaje = get_percentage($Total, $value);
		 
		 	if ($Porcentaje >= 0 and $Porcentaje <= 10 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width:'. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}elseif ($Porcentaje >= 11 and $Porcentaje <= 25 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-info" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}elseif ($Porcentaje >= 25 and $Porcentaje <= 30 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}elseif ($Porcentaje >= 40 and $Porcentaje <= 100 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}
			
         echo '<tr class="text-center" style="font-size: 12px;">
		<td><b class="text-info">'.htmlspecialchars($key).'</b></td>
		<td><b class="text-info"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$value.'</span></b></td>	
		<td><center><b class="text-danger">'.$ripx.'</b></center></td>	
			</tr>';
                  


         echo '</tr>';
        }
       ?>
    </tbody>
 </table>	
                          
                      </div>
             </div>
   </div>
   <?php

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

		$date_one = date('d/m/Y', time());
		$date_two = date('d/m/Y', $onedayago);
		$date_three = date('d/m/Y', $twodaysago);
		$date_four = date('d/m/Y', $threedaysago);
		$date_five = date('d/m/Y', $fourdaysago);
		$date_six = date('d/m/Y', $fivedaysago);
		$date_seven = date('d/m/Y', $sixdaysago);

    $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $monthdaysago, ":after" => time()));
		$count_month = $SQL->fetchColumn(0);

		?>
	<div class="col-md-6">
<div class="block animated zoomIn block-themed">
<div class="block-header " style="background: linear-gradient(135deg, #2facb2 0, #6eab4d 100%)!important;">
<h3 class="block-title"><i class="fa fa-server"></i> Graph</h3> <small style="color: white; font-size: 15px;">Last 7 days total attacks</small>
<div class="block-options">
<a href="servers" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
<i class="si si-eye"></i>
</a>
</div>
</div>
<div class="block-content">
<div class="block block-transparent bg-image animated zoomIn" style="background-image: url('assets/img/photos/photo23@2x.jpg');">
<div class="block-content block-content-full text-center bg-black-op-25">
<div class="row gutters-tiny pt-30">

<div class="col-4">
<div class="font-size-sm font-w600 text-white-op text-uppercase">This Week</div>
<div class="font-size-h3 font-w600 text-white"><?php echo $count_one + $count_two + $count_three + $count_four + $count_five + $count_six + $count_seven; ?></div>
<!--<div class="font-w600 text-danger">
<i class="fa fa-caret-down"></i> -10%
</div>-->
</div>

</div>
</div>
<div class="block-content block-content-full bg-black-op-25">
<div class="pull-all"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
<canvas id="graph" style="display: block;" height="72"></canvas>
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
<script src="grafici/jquery.min.js" type="text/javascript"></script>
<script src="grafici/jquery.flot.js" type="text/javascript"></script>
<script type="text/javascript">
        var plot = $.plot("#chart-dynamic", [[1,2,3,4,5] ], {
            series: {
                label: "Server Process Data",
                lines: {
                    show: true,
                    lineWidth: 0.2,
                    fill: 0.8
                },
    
                color: '#edeff0',
                shadowSize: 0
            },
            yaxis: {
                min: 0,
                max: 100,
                tickColor: '#31424b',
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#98a7ac"
                },
                shadowSize: 0
    
            },
            xaxis: {
                tickColor: '#31424b',
                show: true,
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#98a7ac"
                },
                shadowSize: 0,
                min: 0,
                max: 250
            },
            grid: {
                borderWidth: 1,
                borderColor: '#31424b',
                labelMargin:10,
                mouseActiveRadius:6
            },
            legend:{
                show: false
            }
        });


var xVal = 0;
var data = [[]];
function getData(yVal1){
	
	
    var datum1 = [xVal, yVal1];
    data[0].push(datum1);
    if(data[0].length>300){
        data[0] = data[0].splice(1);
    }
    xVal++;
    plot.setData(data);
    plot.setupGrid();
    plot.draw();
}

setInterval(function(){
$.get( "ripx/load.php", function( data ) {
  getData(parseInt(data));
});
}, 1000);
</script>
<script type="text/javascript">
        var plot = $.plot("#chart-dynamic", [[1,2,3,4,5] ], {
            series: {
                label: "Server Process Data",
                lines: {
                    show: true,
                    lineWidth: 0.2,
                    fill: 0.8
                },
    
                color: '#edeff0',
                shadowSize: 0
            },
            yaxis: {
                min: 0,
                max: 100,
                tickColor: '#31424b',
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#98a7ac"
                },
                shadowSize: 0
    
            },
            xaxis: {
                tickColor: '#31424b',
                show: true,
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#98a7ac"
                },
                shadowSize: 0,
                min: 0,
                max: 250
            },
            grid: {
                borderWidth: 1,
                borderColor: '#31424b',
                labelMargin:10,
                mouseActiveRadius:6
            },
            legend:{
                show: false
            }
        });


var xVal = 0;
var data = [[]];
function getData(yVal1){
	
	
    var datum1 = [xVal, yVal1];
    data[0].push(datum1);
    if(data[0].length>300){
        data[0] = data[0].splice(1);
    }
    xVal++;
    plot.setData(data);
    plot.setupGrid();
    plot.draw();
}

setInterval(function(){
$.get( "ripx/load.php", function( data ) {
  getData(parseInt(data));
});
}, 1000);
</script>
<script>
/*
 *  Document   : be_pages_dahboard.js
 *  Author     : pixelcave
 */

var BePagesDashboard=function() {
    var a=function() {
        Chart.defaults.global.defaultFontColor="#555555",
        Chart.defaults.scale.gridLines.color="transparent",
        Chart.defaults.scale.gridLines.zeroLineColor="transparent",
        Chart.defaults.scale.display=!1,
        Chart.defaults.scale.ticks.beginAtZero=!0,
        Chart.defaults.global.elements.line.borderWidth=2,
        Chart.defaults.global.elements.point.radius=5,
        Chart.defaults.global.elements.point.hoverRadius=7,
        Chart.defaults.global.tooltips.cornerRadius=3,
        Chart.defaults.global.legend.display=!1;
        var a,
        e,
        r=jQuery("#graph"),
        l= {
            labels:["<?php echo $date_seven; ?>",
            "<?php echo $date_six; ?>",
            "<?php echo $date_five; ?>",
            "<?php echo $date_four; ?>",
            "<?php echo $date_three; ?>",
            "<?php echo $date_two; ?>",
            "<?php echo $date_one; ?>"],
            datasets:[ {
                label: "This Week", fill: !0, backgroundColor: "rgba(1,229,148,.25)", borderColor: "rgba(1,229,148,1)", pointBackgroundColor: "rgba(1,229,148,1)", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "rgba(1,229,148,1)", data: [<?php echo $count_seven; ?>, <?php echo $count_six; ?>, <?php echo $count_five; ?>, <?php echo $count_four; ?>, <?php echo $count_three; ?>, <?php echo $count_two; ?>, <?php echo $count_one; ?>]
            }
            ]
        }
        ,
        t= {
            scales: {
                yAxes:[ {
                    ticks: {
                        suggestedMax: 50
                    }
                }
                ]
            }
            ,
            tooltips: {
                callbacks: {
                    label:function(a, e) {
                        return" "+a.yLabel+" Attacks"
                    }
                }
            }
        }
        ,
        n= {
            scales: {
                yAxes:[ {
                    ticks: {
                        suggestedMax: 480
                    }
                }
                ]
            }
            ,
            tooltips: {
                callbacks: {
                    label:function(a, e) {
                        return" $ "+a.yLabel
                    }
                }
            }
        }
        ;
        r.length&&(a=new Chart(r, {
            type: "line", data: l, options: t
        }
        ))
    }
    ;
    return {
        init:function() {
            a()
        }
    }
}

();
jQuery(function() {
    BePagesDashboard.init()
}

);
</script>
