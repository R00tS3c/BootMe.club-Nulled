<?php 

 // RiPx is the best ;)
 // if you leak this source you are dead nigga
 
session_start();
$page = "Addons";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
	
		
?>

<main id="main-container" style="min-height: 951px;">
<div class="bg-primary">
    <div class="bg-pattern bg-black-op-25" style="background-image: url('bg-pattern.png');">
        <div class="content content-top text-center">
            <div class="py-50">
                <h1 class="font-w700 text-white mb-10">Addons</h1>
                <h2 class="h4 font-w400 text-white-op">You can upgrade your plan ;)</h2>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row py-30">
	
	 <?php
								$SQLGetPlans = $odb -> query("SELECT * FROM `addons` WHERE `private` = 0 ORDER BY `ID` ASC");
								while ($getInfo = $SQLGetPlans -> fetch(PDO::FETCH_ASSOC)){
									$id = $getInfo['ID'];
									$name = $getInfo['name'];
									$price = $getInfo['price'];
									$length = $getInfo['length'];
									$unit = $getInfo['unit'];
									$vip = $getInfo['vip'];

									if($vip == "0")
									{
										$xdd = 'pricing-box';
									}
									
									if($vip == "1")
									{
										$xdd = 'pricing-box featured-plan';
									}
									
									
									if($vip == "0")
									{
										$rip = ' <span class="text-danger font-w700"><i class="fa fa-space-shuttle"></i> No <i class=""></i></span>';
									}
									
									if($vip == "1")
									{
										$rip = ' <span class="text-success font-w700"><i class="fa fa-space-shuttle"></i> Yes </i></span>';
									}
									
									
									if($vip == "0")
									{
										$vip = '<h4 class="price-lable text-white bg-warning"> Addons</h4>';
									}
									
									if($vip == "1")
									{
										$vip = '<h4 class="price-lable text-white bg-warning"> Addons</h4>';
									}
									
							
									
									
									$ID = $getInfo['ID'];

									echo ' 
									
									
									  <div class="col-md-6 col-xl-3">
            <a class="block block-link-pop block-rounded block-bordered text-center" style="    border: 1px solid #004b95;" href="javascript:void(0)">
                <div class="block-header">
                    <h3 class="block-title"> </h3>
                </div>
                <div class="block-content bg-body-light">
                    <div class="h1 font-w700 mb-10">€'.htmlentities($price).'</div>
                    <div class="h5 text-muted">'.htmlentities($length).' '.htmlspecialchars($unit).'</div>
                </div>
                <div class="block-content">
                    <p><strong class="text-primary">Addon Name</strong>:  '.htmlspecialchars($name).'</p>
					<p><strong class="text-success">Duration</strong>: LifeTime</p>
                </div>
                <div class="block-content block-content-full">
                    <span class="btn btn-hero btn-sm btn-rounded btn-noborder btn-primary">
                        <i class="fa fa-arrow-up mr-5"></i> Upgrade
                    </span>
                </div>
            </a>
        </div>';
								}
								
								
								?>

    </div>
</div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      