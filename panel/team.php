<?php 
session_start();

$page = "Team";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
		
?>

 <main id="main-container" style="min-height: 911px;">
<div class="bg-primary">
    <div class="bg-pattern bg-black-op-25" style="background-image: url('bg-pattern.png');">
        <div class="content content-top text-center">
            <div class="py-50">
                <h1 class="font-w700 text-white mb-10">☠ Blizzard Team ☠</h1>
                <h2 class="h4 font-w400 text-white-op">The Best profesional team.</h2>
            </div>
        </div>
    </div>
</div>
<div class="content content-full">
    <div class="row gutters-tiny py-20">
        <div class="col-md-6 col-xl-4">
            <div class="block text-center">
                <div class="block-content">
                    <img class="img-avatar img-avatar96" src="rip.png" alt="">
                </div>
                <div class="block-content block-content-full">
                    <div class="font-size-h4 font-w600 mb-0">😼 Grenus 😼</div>
                    <div class="font-size-h5 text-muted">CEO</div>
                </div>
                <div class="block-content block-content-full bg-body-light">
                    <a class="btn btn-circle btn-secondary" href="javascript:void(0)">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-circle btn-secondary" href="javascript:void(0)">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-circle btn-secondary" href="javascript:void(0)">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
		<div class="col-md-6 col-xl-4">
            <div class="block text-center">
                <div class="block-content">
                    <img class="img-avatar img-avatar96" src="perro.png" alt="">
                </div>
                <div class="block-content block-content-full">
                    <div class="font-size-h4 font-w600 mb-0">RootSec</div>
                    <div class="font-size-h5 text-muted">CEO & Developer</div>
                </div>
                <div class="block-content block-content-full bg-body-light">
                    <a class="btn btn-circle btn-secondary" href="javascript:void(0)">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-circle btn-secondary" href="javascript:void(0)">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-circle btn-secondary" href="javascript:void(0)">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      