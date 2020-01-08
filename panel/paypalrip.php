<?php 

session_start();
$page = "Add Balance";
include 'header.php';

		if (isset($_POST['paypal'])) {
			
		$username = $_SESSION['username'];
		$email = $_POST['paypalemail'];
		$adminemail = "Del.ti@o2.pl";
		$method = "PayPal";
		$status = "0";
		
if ($user -> safeString($email)){
$error = error('What are you trying?');  
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error = error('Email is not a valid');  
}
if (empty($email)) {
$error = error('Please verify all fields');
}

if(empty($error)){

$insert = $odb->prepare("INSERT INTO `addbalance` VALUES (NULL,?,?,?,?,?,?)");
$insert->execute(array($username,time(),$email,$adminemail,$method,$status));
$success = success('The information was sent to an admin wait 30-120min!');

echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("info!","The information was sent to an admin wait 30-120min!","info");';
echo '}, 1000);</script>';   
}

		}

		?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
   <?php if (isset($error)) { echo $error; }elseif(isset($success)) { echo $success; } ?>
<div class="row">

<div class="col-md-5">
            <div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-header bg-corporate-dark">
                    <h3 class="block-title"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> Add your balance! </span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                       
                    </div>
                </div>
                <div class="block-content">
				 <form class="form-horizontal" id="loginform" method="post">
                                        <div class="form-horizontal">
                                            <div class="form-group ">
											      <div class="alert alert-danger">If you do not have Friends and Family, We can see your complete address and name. In the case of a payment not made via Friends and Family, you will not get your plan!</div>
				
				<div class="alert alert-success text-center" style="background-color:rgba(13, 153, 224, 0.25) !important; border-color:rgba(6, 158, 253, 0.5) !important; color:white;"><center><span class="badge badge-pill badge-danger"><i class="fa fa-cog mr-5"></i>PayPal Email:</span> Del.ti@o2.pl </center></div>
				<div class="alert alert-success text-center" style="background-color:rgba(13, 153, 224, 0.25) !important; border-color:rgba(6, 158, 253, 0.5) !important; color:white;"><center><span class="badge badge-pill badge-danger"><i class="fa fa-cog mr-5"></i>BTC Adress:</span> 15hF2KriWqwT1FYo8oaL2S499g7mtwp4Sg </center></div>
								<div class="alert alert-success text-center" style="background-color:rgba(13, 153, 224, 0.25) !important; border-color:rgba(6, 158, 253, 0.5) !important; color:white;"><center><span class="badge badge-pill badge-danger"><i class="fa fa-cog mr-5"></i>Skrill Email:</span> mgstresser@gmail.com </center></div>
                                                   <div class="form-group">
                        <div class="col-sm-12">
					<h4>Write this code as a message:</h4>
					<input type="text" style="background-color: #25292d; border-color: black;" id="example-input-large" name="example-input-large" class="form-control" value="Hello, I Am <?php echo $_SESSION['username']; ?>" disabled="">
				</div>
                        </div>
                                                <br>
                                                <div class="form-group">
                              <div class="col-sm-12">

<h4>PayPal Email:</h4>
<input type="text" class="form-control" id="paypalemail" name="paypalemail" placeholder="Your Paypal Email" value="" autocomplete="off">
                           
				</div>
                                                    <div class="form-group form-actions">
                                                        <div class="col-xs-8">
                                                        </div>
                                                        <div class="form-group text-center m-t-20">
                                                            <div class="col-12 mb-10">
															<br>
															  <button type="submit" name="paypal" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">
                                                                    <i class="fa fa-bolt"></i> Click here if you paid
                                                                </button>
                                                    <small>Click Here <b>after</b> you have paid</small>
								
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </form>
                </div>
            </div>
        </div>
		<div class="col-md-7">
  <div class="block block-themed animated zoomIn boxshadow" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-header bg-corporate-dark">
<div class="font-w600 text-white">
<i class="fa fa-money fa-spin text-primary"></i>
</div>
</div>
<div class="block-content block-content-dark">
                                <table class="table">
                                <thead>
                                   <tr>
                                   <th  style="font-size: 12px;">Username</th>
                                   <th  style="font-size: 12px;">My Email</th>
                                   <th  style="font-size: 12px;">Method</th>
                                   <th  style="font-size: 12px;">Date</th>
                                   <th  style="font-size: 12px;">Status</th>
                                   </tr>
                                   </thead>
                                <tbody>
                                    <?php
                                        $SQLGetMessages = $odb -> prepare("SELECT * FROM `addbalance` WHERE `username` = :username ORDER BY date LIMIT 8");
                                        $SQLGetMessages -> execute(array(':username' => $_SESSION['username']));
                                        while ($show = $SQLGetMessages -> fetch(PDO::FETCH_ASSOC)){
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
                                         <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$myemail.'$</span></td>
                                         <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> '.$method.'</span></td>
                                         <td>'.date("d-m-Y, h:i:s a", $date).'</td>
                                         <td>'.$statusPayment.'</td>
                                         </tr>
                                         ';

                                        }
                                    ?>
                                </tbody>
                            </table>
							
							
							
							
							
							


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
