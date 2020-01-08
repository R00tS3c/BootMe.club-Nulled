<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Members";
include 'header.php';

		
		?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">

<div class="row">
<div class="col-lg-12">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-users"></i> Total Users</h3>
</div>
<div class="block-content block-content-dark">
<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ID</th>
                                            <th>User</th>
                                            <th>Email</th>
											<th>Member</th>
                                            <th>Last IP</th>
                                            <th>Last Login</th>
                                            <th>Rank</th>
                                        
                                            <th style="width: 50px;">Status</th>
                                            
                                            <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
         $getusers = $odb -> prepare("SELECT * FROM users ORDER BY ID ASC");
         $getusers -> execute();
     while ($getInfo = $getusers -> fetch(PDO::FETCH_ASSOC))
      {
        $id = $getInfo['ID'];
        $user = $getInfo['username'];
        $email = $getInfo['email'];
        $rank = $getInfo['rank'];
        $rank1 = $getInfo['rank'];
        $lastip = $getInfo['lastip'];
        $lastlogin = date("m-d-Y, h:i:s a" ,$getInfo['lastlogin']);
        $status = (strlen($getInfo['status']) == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Banned</span>';
        $action = $getInfo['lastact'];
        $userInfoDatax = $odb->query("SELECT * FROM `users` WHERE `username` = '". $user."'");
        $userInfox = $userInfoDatax->fetch(PDO::FETCH_BOTH);
        $planInfoDatax = $odb->query("SELECT * FROM `plans` WHERE `id` = '".$userInfox['membership']."'");
        $planInfox = $planInfoDatax->fetch(PDO::FETCH_BOTH);
		
		
		if($planInfox['vip'] == "1") {
           $usernameSQLx = '<span class="badge badge-danger">ViP User</span>';
        }elseif($planInfox['vip'] == "0") {
            $usernameSQLx = '<span class="badge badge-warning">Paid User</span>';

        }else{
          $usernameSQLx = '<span class="badge badge-primary">Free User</span>';
        }
		

          if ($rank > 69) {
          $rank = '<span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">Admin</span>';
          } elseif ($rank == 1) {
          $rank = '<span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">Support</span>';
          } else {
          $rank = '<span class="badge badge-success">Member</span>';
          }

        
         
                                           echo '<tr>
                                            <td class="text-center"><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">'.$id.'</span></td>
                                            <td><strong><span class="badge badge-primary">'.$user.'</span></strong></td>
                                            <td>'.$email.'</td>
											<td>'.$usernameSQLx.'</td>
                                            <td>'.$lastip.'</td>
                                            <td>'.$lastlogin.'</td>
                                            <td>'.$rank.'</td>
                                            <td>'.$status.'</td>
                                          
                                            <td class="text-center">
                                                <a href="user.php?id='.$id.'" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                
                                            </td>
                                        </tr>';
                              }
                          ?>
                                                                 
                                    </tbody>
            </table></div></div></div>
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
