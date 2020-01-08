<?php 

session_start();
$page = "Hub";
include 'header.php';

	if(!$user -> hasMembership($odb)) {
		header('location: index.php');
		die();
	}
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
	
?>
<main id="main-container" style="min-height: 536px;">
    <div class="content">
               <?php 
							if (!$user->hasMembership($odb))
								{
							?>
											
             <div class="alert" style="    background-color: rgba(255, 170, 0, 0.2) !important;
    border-color: rgba(255, 170, 0, 0.5) !important;
    color: #ffaa00;">
												<h4>WARNING!</h4>
												<p>
													You don't have an active membership!
												</p>
												<p class="m-t-10">
													<a href="purchase.php" class="btn btn-warning waves-effect waves-light">
														Purchase
													</a>
												</p>
											</div>
            <?php } ?>
		<div id="attackalert" style="display:none"></div>
		
        <div class="row">
            <div class="col-lg-5">
                <div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                    <div class="block-header bg-corporate-dark">
                        <h3 style="color: white;" class="block-title"><i class="fa fa-bullhorn"></i> Hub Attack</h3> <i class="fa fa-spinner fa-bolt text-danger" id="attackloader" style="display:none"></i>
                        <button type="button" class="btn-block-option"> <i class="fa fa-spin fa-times"></i> </button>
                    </div>
                    <div class="block-content block-content-dark">
                        <form class="form-horizontal" method="post" onsubmit="return false;">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control" id="host" name="host">
                                            <label for="host"><i class="si si-arrow-right text-danger"></i> Host</label>
                                            <div class="form-text text-muted text-right"> IP: 1.2.3.4 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control" id="port" name="port">
                                            <label for="port"><i class="fa fa-bullseye text-danger"></i> Port</label>
                                            <div class="form-text text-muted text-right">e.x 80</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control" id="time" name="time">
                                            <label for="time"><i class="fa fa-clock-o text-danger"></i> Time</label>
                                            <div class="form-text text-muted text-right"> seconds</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div>
                                        <label for="method"><i class="si si-energy text-danger"></i> Method</label>
                                        <select class="form-control" style="border: 1px solid #4c535c;" id="method" name="method">
                                           	<optgroup label="DRDOS AMPS" style="color:green;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'amps' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">' . $fullname . '</option>';
															}
														?>
														</optgroup>
                                                                                                                             	<optgroup label="TCP" style="color:#00bbff;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'tcp' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">' . $fullname . '</option>';
															}
														?>
														</optgroup>
                                                                                                                             	<optgroup label="UDP" style="color:#00bbff;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'udp' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">' . $fullname . '</option>';
															}
														?>
														</optgroup>
                                                                                  <optgroup label="MISC" style="color:#00bbff;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'misc' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">' . $fullname . '</option>';
															}
														?>
														</optgroup>
														  <optgroup label="Layer7 (Deucalion) " style="color:purple;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'layer7' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">'. $fullname . '</option>';
															}
														?>
														</optgroup>
														  <optgroup label="Layer7 (VIP) " style="color:#e54e55;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'l7vip' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">'. $fullname . '</option>';
															}
														?>
														</optgroup>
														      <optgroup label="VIP Layer4" style="color:#e54e55;">
														<?php
															$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'vips' ORDER BY `id` ASC");
															while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
																$name     = $getInfo['name'];
																$fullname = $getInfo['fullname'];
																echo '<option value="' . $name . '">'. $fullname . '</option>';
															}
														?>
														</optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label"><i class="fa fa-server text-danger"></i> Servers per attack </label>
                                <input id="totalservers" style="border: 1px solid #4c535c;"type="text" value="1" name="totalservers" data-bts-min="1" data-bts-max="10" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-primary btn-trans waves-effect w-md waves-info m-b-5" data-bts-button-up-class="btn btn-success"> Max Servers Per Attack:
                                <?php 
								
							$SQL = $odb->prepare("SELECT `aserv` FROM `users` WHERE `users`.`ID` = :id");
			$SQL ->execute(array(':id' => $_SESSION['ID']));
			$aserv = $SQL -> fetchColumn(0);
			
								$SQLGetTime = $odb->prepare("SELECT `plans`.`totalservers` FROM `plans` LEFT JOIN `users` ON `users`.`membership` = `plans`.`ID` WHERE `users`.`ID` = :id");
				    $SQLGetTime->execute(array(
				        ':id' => $_SESSION['ID']
				    ));
				    $totalservers = $SQLGetTime->fetchColumn(0); echo $totalservers+$aserv; 
					?>
                            </div>
							    <div class="form-group">
      <div class="col-xs-12">
          <div>
            <label for="method"><i class="fa fa-rss text-danger"></i> ViP</label>
                              <select class="form-control" style="border: 1px solid #4c535c;" id="vip" name="vip">
          <option value="0">No</option>
          <option value="1">Yes</option>
          </select>
          </div>
      </div>
  </div>
  
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-12">
									<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" onclick="attack()" id="hit" type="button"> <i class="fa fa-bolt"></i> Hit Target </button>
									
                                </div>
                            </div>
							
                        </form>
						
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                    <div class="block-header bg-corporate-dark">
                        <h3 class="block-title"><i class="si si-list"></i> Manage Attacks <i style="display: none;" id="manage" class="fa fa-cog fa-spin"></i></h3>
                        <div class="block-options">
                            <button onclick="attacks()" class="btn btn-warning"><i class="fa fa-refresh"></i> Refresh</button>
                        </div>
                    </div>
                    <div class="block-content block-content-dark">
                        <div id="attacksdiv" style="display:block;"></div>
                    </div>
                </div>
            </div>
            <script>
                attacks();

                function attacks() {
                    document.getElementById("attacksdiv").style.display = "none";
                    document.getElementById("manage").style.display = "inline";
                    var xmlhttp;
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("attacksdiv").innerHTML = xmlhttp.responseText;
                            document.getElementById("manage").style.display = "none";
                            document.getElementById("attacksdiv").style.display = "inline-block";
                            document.getElementById("attacksdiv").style.width = "100%";
                            eval(document.getElementById("ajax").innerHTML);
                        }
                    }
                    xmlhttp.open("GET", "ripx/attacks.php", true);
                    xmlhttp.send();
                }

                function attack() {
                    var host = $('#host').val();
                    var time = $('#time').val();
                    var port = $('#port').val();
                    var method = $('#method').val();
                    var totalservers = $('#totalservers').val();
					var vip=$('#vip').val();
                    document.getElementById("attackalert").style.display = "none";
                    //ocument.getElementById("attackloader").style.display="inline";
                    var xmlhttp;
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("attackalert").innerHTML = xmlhttp.responseText;
                            //document.getElementById("attackloader").style.display="none";
                            document.getElementById("attackalert").style.display = "inline";
                            if (xmlhttp.responseText.search("SUCCESS") != -1) {
                                toastr["success"]("Attack has been successfully sent!", "Attack Sent!")
                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "1000",
                                    "hideDuration": "1000",
                                    "timeOut": "9000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                                attacks();
                                window.setInterval(attacks(), 2000);
								swal('Attack Sent Successfully!', xmlhttp.responseText, 'info')
                            } else {
                                toastr["error"]("error!", "Oops...")
                                swal('Oops...', xmlhttp.responseText, 'error')
                            }
                        }
                    }
                    xmlhttp.open("GET", "ripx/hub.php?type=start" + "&host=" + host + "&port=" + port + "&time=" + time + "&method=" + method + "&totalservers=" + totalservers + "&vip=" + vip, true);
                    xmlhttp.send();
                    attacks();
                }

                function renew(id) {
                    document.getElementById("attackalert").style.display = "none";
                    document.getElementById("attackloader").style.display = "inline";
                    var xmlhttp;
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("attackalert").innerHTML = xmlhttp.responseText;
                            document.getElementById("attackloader").style.display = "none";
                            document.getElementById("attackalert").style.display = "inline";
                            if (xmlhttp.responseText.search("Attack sent successfully") != -1) {
                                attacks();
                            }
                        }
                    }
                    xmlhttp.open("GET", "ripx/hub.php?type=renew" + "&id=" + id, true);
                    xmlhttp.send();
                    attacks();
                }

                function stop(id) {
                    document.getElementById("attackalert").style.display = "none";
                    document.getElementById("attackloader").style.display = "inline";
                    var xmlhttp;
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("attackalert").innerHTML = xmlhttp.responseText;
                            document.getElementById("attackloader").style.display = "none";
                            document.getElementById("attackalert").style.display = "inline";
                            if (xmlhttp.responseText.search("SUCCESS") != -1) {
								
								toastr["info"]("Attack has been successfully Stopped!", "Attack Stopped!")
                                toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "1000",
                                    "hideDuration": "1000",
                                    "timeOut": "9000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
								
                                attacks();
                            }
                        }
                    }
                    xmlhttp.open("GET", "ripx/hub.php?type=stop" + "&id=" + id, true);
                    xmlhttp.send();
                }

            </script>
        </div>
    </div>
</main>
</div>
<!-- END Page Container -->
<?php include('footer.php'); ?>
