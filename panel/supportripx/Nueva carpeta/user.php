<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Settings";
include 'header.php';

		$updated = false;	
		if(isset($_POST['stresser'])){


		
		if ($cooldown != $_POST['cooldown']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `cooldown` = :cooldown");
			$SQL -> execute(array(':cooldown' => $_POST['cooldown']));
			$cooldown = $_POST['cooldown'];
			$updated = true;
		}

		
		if ($rotation != $_POST['rotation']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `rotation` = :rotation");
			$SQL -> execute(array(':rotation' => $_POST['rotation']));
			$rotation = $_POST['rotation'];
			$updated = true;
		}
		
		if ($cloudflare_set != $_POST['cloudflare_set']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `cloudflare_set` = :cloudflare_set");
			$SQL -> execute(array(':cloudflare_set' => $_POST['cloudflare_set']));
			$cloudflare_set = $_POST['cloudflare_set'];
			$updated = true;
		}
		
		if ($google_site != $_POST['google_site']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `google_site` = :google_site");
			$SQL -> execute(array(':google_site' => $_POST['google_site']));
			$google_site = $_POST['google_site'];
			$updated = true;
		}
		
		if ($google_secret != $_POST['google_secret']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `google_secret` = :google_secret");
			$SQL -> execute(array(':google_secret' => $_POST['google_secret']));
			$google_secret = $_POST['google_secret'];
			$updated = true;
		}
		
		if ($paypal_email != $_POST['paypal_email']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `paypal_email` = :paypal_email");
			$SQL -> execute(array(':paypal_email' => $_POST['paypal_email']));
			$paypal_email = $_POST['paypal_email'];
			$updated = true;
		}
		
		if ($paypal != $_POST['paypal']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `paypal` = :paypal");
			$SQL -> execute(array(':paypal' => $_POST['paypal']));
			$paypal = $_POST['paypal'];
			$updated = true;
		}
		if ($coinpayments != $_POST['coinpayments']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `coinpayments` = :coinpayments");
			$SQL -> execute(array(':coinpayments' => $_POST['coinpayments']));
			$coinpayments = $_POST['coinpayments'];
			$updated = true;
		}
		
		
		if($updated == true){
			$done = "Website settings have been updated";
		}
	}
	
	
	
		?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
<div class="row">
<div class="col-md-7" data-select2-id="9">
            <form class="form-horizontal push-10-t" method="post">
                <div class="block block-rounded block-themed" data-select2-id="7">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">General Settings</h3>
                        <div class="block-options">
                            <button type="submit" name="stresser" value="do" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full" data-select2-id="6">
             
                                         <div class="form-group">
                                            <div class="col-sm-12">
												 <label for="attacktype">Attack rotation</label>
                                                    <select class="form-control" id="attacktype" name="rotation" size="1">
                                                        <option value="1" <?php if ($rotation == '1') { echo 'selected'; } ?>>Yes</option>
														<option value="0" <?php if ($rotation == '0') { echo 'selected'; } ?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="col-sm-12">
												 <label for="attacktype">cloudflare</label>
                                                    <select class="form-control" id="attacktype" name="cloudflare_set" size="1">
                                                        <option value="1" <?php if ($cloudflare_set == '1') { echo 'selected'; } ?>>Yes</option>
														<option value="0" <?php if ($cloudflare_set == '0') { echo 'selected'; } ?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="col-sm-12">
												 <label for="attacktype">Paypal</label>
                                                    <select class="form-control" id="attacktype" name="paypal" size="1">
                                                        <option value="1" <?php if ($paypal == '1') { echo 'selected'; } ?>>Yes</option>
														<option value="0" <?php if ($paypal == '0') { echo 'selected'; } ?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
												<label for="google_site">Google ReCaptcha Public</label>
                                                    <input class="form-control text-success" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="google_site" name="google_site" value="<?php echo htmlspecialchars($google_site); ?>" placeholder="Find these details in Google ReCaptcha">
                                                    
													
                                                </div>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
												<label for="google_secret">Google ReCaptcha Secret</label>
                                                    <input class="form-control text-danger" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="google_secret" name="google_secret" value="<?php echo htmlspecialchars($google_secret); ?>" placeholder="Find these details in Google ReCaptcha">
                                                    
                                                </div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
												<label for="paypal_email">Paypal Email</label>
                                                    <input class="form-control text-primary" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="paypal_email" name="paypal_email" value="<?php echo $paypal_email; ?>" placeholder="Find these details in Google ReCaptcha">
                                                    
                                                </div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
												<label for="coinpayments">Coinpayments</label>
                                                    <input class="form-control text-info" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="coinpayments" name="coinpayments" value="<?php echo $coinpayments; ?>" placeholder="Find these details in Google ReCaptcha">
                                                    
                                                </div>
                                            </div>
                                        </div>
										
                                      	<div class="form-group">
										   <div class="col-sm-12">
												 <label for="attacktype">Cooldown</label>
                                                    <select class="form-control" id="attacktype" name="cooldown" size="1">
                                                        <option value="1" <?php if ($cooldown == '1') { echo 'selected'; } ?>>Yes</option>
														<option value="0" <?php if ($cooldown == '0') { echo 'selected'; } ?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
                    </div>
                </div>
            </form>
        </div>
		<div class="col-md-5">
            <form action="be_pages_ecom_product_edit.php" method="post" onsubmit="return false;">
                <div class="block block-rounded block-themed">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">Sooon!!!</h3>
                        <div class="block-options">
                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Save
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="form-group row">
                            <label class="col-12">Theme [Soon]</label>
                            <div class="col-12">
                                <label class="css-control css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" id="ecom-product-condition-new" name="ecom-product-condition" checked="">
                                    <span class="css-control-indicator"></span> Dark
                                </label>
                                <label class="css-control css-control-secondary css-radio">
                                    <input type="radio" class="css-control-input" id="ecom-product-condition-old" name="ecom-product-condition">
                                    <span class="css-control-indicator"></span> Normal
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12">Hub [Soon]</label>
                            <div class="col-12">
                                <label class="css-control css-control-success css-switch">
                                    <input type="checkbox" class="css-control-input" id="ecom-product-published" name="ecom-product-published" checked="">
                                    <span class="css-control-indicator"></span>
                                </label>
                            </div>
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
