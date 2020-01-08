<?php 

    // RiPx is the best ;)
    // if you leak this source you are dead nigga
    // Si publicas la source estas muerto!
	
session_start();
$page = "Purchase";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
	
	   if (!($user->isVerified($odb)))
       {
        header('location: verifyuser.php');
        die();
        }

if(isset($_POST['x'])){
    $DisApi = 'https://www.rip-protocol.com/discord/lol.php?user=rip&email=testin@gmail.com&plan=lifetime&date=1536356112&ip=34.34.34.34';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $DisApi);
    curl_setopt($ch, CURLOPT_REFERER, 'https://google.com');
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_exec($ch);
    curl_close($ch);
}
		
?>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
   <h3><center><div class="alert alert-warning alert-dismissable animation-bigEntrance"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><font><b>INFO</b></font><b><font color="White"><marquee behavior="scroll" direction="left"> After you bought with other way as balance open a ticket!  </marquee></font></b></div></center></h3>
   <div class="row">
  


			  <?php
												$SQLGetPlans = $odb -> query("SELECT * FROM `plans` WHERE `private` = 0 ORDER BY `ID` ASC");
												while ($getInfo = $SQLGetPlans -> fetch(PDO::FETCH_ASSOC))
												{
									$id = $getInfo['ID'];
									$name = $getInfo['name'];
									$price = $getInfo['price'];
									$length = $getInfo['length'];
									$unit = $getInfo['unit'];
									$concurrents = $getInfo['concurrents'];
									$mbt = $getInfo['mbt'];
									$network = $getInfo['vip'];
									$api = $getInfo['api'];
									$totalservers = $getInfo['totalservers'];
															
									if($network == "0")
									{
										$network = '<b class="text-primary"><i class="fa fa-feed text-warning"></i> Normal</b>';
										$colorx = 'bg-body-light';
										
									}elseif($network == "1")
									{
										$network = '<span class="text-danger font-w700"></i> VIP <i class="si si-fire text-warning"></i></span>';
										$colorx = 'bg-primary';
									}
									if($api == "0")
									{
										$api = '<span class="text-success font-w700"></i> No <i class="fa fa-bolt text-secondary"></i></span>';
									}elseif($api == "1")
									{
										$api = '<span class="text-primary font-w700"></i> Yes <i class="si si-fire text-success"></i></span>';
									}
									
					
										
echo '<div class="col-md-6 col-xl-3">
            <a class="block block-rounded text-center" href="invoice.php?id='. $id .'" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-header">
                    <h3 class="block-title">'.htmlspecialchars($name).'</h3>
                </div>
                <div class="block-content '.$colorx.'">
                    <div class="h1 font-w700 mb-10 text-white">€'.htmlentities($price).'</div>
                    <div class="h5 text-muted text-white-op">'.htmlentities($length).' '.htmlspecialchars($unit).'</div>
                </div>
                <div class="block-content">
                    <p><strong>Concurrents: </strong> <span class="badge" style="background: linear-gradient(135deg, #0d89ed 0, rgba(66, 165, 245, 0.36) 100%)!important;">'.$concurrents.'</span></p>
                    <p><strong>Seconds: </strong> <span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">'.htmlentities($mbt).'</span></p>
                    <p><strong>Network: </strong> '.$network.' </p>
                    <p><strong>ApiAccess: </strong> '.$api.'</p>
					<p><strong>TotalServers: </strong> <span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$totalservers.'</span></p>
                </div>
				
               <div class="block-content block-content-full">
                    <span class="btn btn-hero btn-sm btn-rounded btn-noborder btn-primary">
                        <i class="fa fa-arrow-up mr-5"></i> Order Now
                    </span>
                </div>
            </a>
        </div>';
                                                    
												
												?>
						         <div class="modal fade" id="modal-fadein<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="mewtoclet" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
        <h3 class="block-title"><i class="fa fa-server"></i>  Plan Name: (<?php echo $name; ?>)</h3>
        <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
        <i class="si si-close"></i>
        </button>
        </div>
        </div>
        <div class="block-content">
                    <div class="block-content">
      <div class="block-content">
	  <form method="post">
											<?php /// HERE NEEDS TO BE TERMS OF SERVICE FROM ADMIN PANEL! ?>
											
											<ul class="list-icons">
											  <li><i class="fa fa-chevron-right text-danger"></i> PLAN NAME : <a class="text-center font-w700 h5 text-info"><i class="fa fa-bolt"></i> <?php echo $name; ?></a></li>
											  <li><i class="fa fa-chevron-right text-danger"></i> PLAN PRICE : <a class="text-center text-success h5 font-w700"><?php echo $price; ?></a></td></li>
											   <li><i class="fa fa-chevron-right text-danger"></i> PRICE (Bitcoin) : <?php echo $priceOfYourItemBTC = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=".$price); ?></li>
											  <li><i class="fa fa-chevron-right text-danger"></i> CONCURRENTS : <a class="text-center font-w700 text-info"><?php echo $concurrents; ?></a></li>
											  <li><i class="fa fa-chevron-right text-danger"></i> NETWORK : <?php echo $vip; ?></li>
										
												
												<div class="col-lg-12 m-t-30">
											  </div>
											</ul>
											
										
									  </div>							
									  <div class="modal-footer">

									  </div>
									  </form>

					</div>
            </div>
  			</div>

  						</div>
              <div class="modal-footer" style="background-color: #1E2125;" >
			  	  	<a href="buy_balance.php?id=<?php echo htmlspecialchars($id); ?>"><button name="balance" value="<?php echo $id; ?>" class="btn btn-outline btn-info"><i class="fa fa-dollar"></i> Balance</a>
	<a href="order.php?id=<?php echo htmlspecialchars($id); ?>"><button name="balance" value="<?php echo $id; ?>" class="btn btn-outline btn-warning"><i class="fa fa-bitcoin"></i> Bitcoin
	<a href="paypl.php?id=<?php echo htmlspecialchars($id); ?>"><button name="balance" value="<?php echo $id; ?>" class="btn btn-outline btn-info"><i class="fa fa-paypal"></i>PayPal


            </div>

  					</div>

  				</div>
								<?php
									} 
								?>
                      
                        <!-- end row -->


                    </div> 
        </div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      