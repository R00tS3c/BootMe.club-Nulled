<?php 
session_start();

$page = "Purchase";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
			
?>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
  <div class="row">
    <div class="col-lg-12">
   
    </div>
</div>
      <div class="alert alert-warning">
          <i class="fa fa-warning"></i> Refunds are not allowed here
      </div>
	  <div class="block block-themed">
<div class="block-header bg-gd-leaf">
<h3 class="block-title"><i class="si si-user text-primary"></i> Normal Plans</h3>
<div class="block-options">
<button type="button" class="btn-block-option">
<i class="si si-wrench"></i>
</button>
</div>
</div>
<div class="block-content">
<table class="table table-striped table-hover table-vcenter">
<thead>
<th class="text-center"><i class="fa fa-info"></i> Name</th>
<th class="text-center"><i class="fa fa-server"></i> Network</th>
<th class="text-center"><i class="si si-ghost"></i> Concurrents</th>
<th class="text-center"><i class="si si-clock"></i> Max Boot Time</th>
<th class="text-center"><i class="si si-clock"></i> API</th>
<th class="text-center"><i class="fa fa-calendar"></i> Length</th>
<th class="text-center"><i class="fa fa-usd"></i> Price</th>
<th class="text-center"><i class="fa fa-money"></i> Payment</th>
</thead>
<tbody>
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
echo '
<tr>
<td class="text-center font-w700 h5 text-info"><i class="fa fa-bolt"></i> '.$name.'</td>
<td class="text-center tossing">'.$network.'</td>
<td class="text-center font-w700">'.$concurrents.'</td>
<td class="text-center font-w700">'.$mbt.' seconds.</td>
<td class="text-center font-w700">'.$api.'</td>
<td class="text-center font-w700">'.htmlentities($length).' '.htmlspecialchars($unit).'</td>
<td class="text-center text-success h5 font-w700">'.$price.'$</td>
<td class="text-center">
<a href="invoice.php?id='. $id .'">
<button type="submit" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i></button>
</a>
</td>
</tr>
';
}
?>
</tbody>
</table>
</div>
</div>



				
						
                      
                        <!-- end row -->


                    </div> 
        </div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      