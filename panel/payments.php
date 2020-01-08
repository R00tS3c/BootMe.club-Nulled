<?php 

session_start();
$page = "Payments";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
	
		
?>

    <main id="main-container" style="min-height: 536px;">
  <div class="content">
  <div class="row gutters-tiny">
        <div class="col-md-6 col-xl-3">
            <a class="block block-transparent text-center bg-gd-sun" href="javascript:void(0)">
                <div class="block-content bg-black-op-5">
                    <p class="font-w600 text-white-op">Pending</p>
                </div>
                <div class="block-content">
                    <p class="font-size-h1 text-white">
					<?php				
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `payments` WHERE `username` = :username AND `status` = '0'");
			$SQL -> execute(array(':username' => $_SESSION['username']));
			$count = $SQL -> fetchColumn(0);
			?>
                        <strong><?= $count; ?></strong>
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-transparent text-center bg-gd-cherry" href="javascript:void(0)">
                <div class="block-content bg-black-op-5">
                    <p class="font-w600 text-white-op">
                        <i class="fa fa-envelope mr-5"></i> Canceled
                    </p>
                </div>
                <div class="block-content">
                    <p class="font-size-h1 text-white">
						<?php				
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `payments` WHERE `username` = :username AND `status` = '1'");
			$SQL -> execute(array(':username' => $_SESSION['username']));
			$count = $SQL -> fetchColumn(0);
			?>
                        <strong><?= $count; ?></strong>
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-transparent text-center bg-gd-lake" href="javascript:void(0)">
                <div class="block-content bg-black-op-5">
                    <p class="font-w600 text-white-op">
                        <i class="fa fa-shopping-cart mr-5"></i> Completed
                    </p>
                </div>
                <div class="block-content">
                    <p class="font-size-h1 text-white">
			<?php				
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `payments` WHERE `username` = :username AND `status` = '2'");
			$SQL -> execute(array(':username' => $_SESSION['username']));
			$count = $SQL -> fetchColumn(0);
			?>
                        <strong><?= $count; ?></strong>
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-transparent text-center bg-gd-dusk" href="javascript:void(0)">
                <div class="block-content bg-black-op-5">
                    <p class="font-w600 text-white-op">
                        <i class="fa fa-line-chart mr-5"></i> All
                    </p>
                </div>
                <div class="block-content">
                    <p class="font-size-h1 text-white">
		    <?php				
			$SQL = $odb -> prepare("SELECT COUNT(*) FROM `payments` WHERE `username` = :username");
			$SQL -> execute(array(':username' => $_SESSION['username']));
			$count = $SQL -> fetchColumn(0);
			?>
                        <strong><?= $count; ?></strong>
                    </p>
                </div>
            </a>
        </div>
    </div>
        <div class="block-content" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">

            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th style="width: 100px;">ID</th>
						  <th>Username</th>
                        <th>Status</th>
                        <th class="d-none d-sm-table-cell">Submitted</th>
                        <th class="d-none d-sm-table-cell">IP Address</th>
                        <th class="d-none d-sm-table-cell">Plan</th>
                        <th class="d-none d-sm-table-cell">Value</th>
                    </tr>
                </thead>
                <tbody>
                   
                   <?php
$newssql = $odb -> query("SELECT * FROM `payments` WHERE `username` = '" . $_SESSION['username'] . "'ORDER BY `id` DESC LIMIT 50");
while($row = $newssql ->fetch(PDO::FETCH_ASSOC)){
	if($row['status'] == '0') {
		$statusPayment = '<span class="badge badge-warning">Pending</span>';
	} elseif($row['status'] == '1') {
		$statusPayment = '<span class="badge badge-danger">Canceled</span>';
	} elseif($row['status'] == '2') {
		$statusPayment = '<span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">Completed!</span>';
	}
	
	$Planinfo = $odb -> query("SELECT `name`,`price` FROM `plans` WHERE `id` = '" . $row['planID'] . "'");
$rowPlan = $Planinfo ->fetch(PDO::FETCH_ASSOC);
    ?>
	 <tr>
                        <td>
						 <a class="font-w600" href="invoice.php?id=<?= $row['planID']; ?>&invoice=<?= $row['invoiceID']; ?>">#<?= htmlentities($row['invoiceID']); ?></a>
                        </td>
						<td class="text-success">
                            <a ><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"><?= $row['username']; ?></span></a>
                        </td>
                        <td>
                           <?= $statusPayment; ?>
                        </td>
                        <td class="d-none d-sm-table-cell">
						<span class="text-warning"><?= date("m/d/y - h:i:s", htmlentities($row['date'])); ?></span>
						</td>
                        <td class="d-none d-sm-table-cell">
                            <a href="javascript:void(0)"><?= htmlentities($row['IP']); ?></a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?= $rowPlan['name']; ?>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="text-success">$<?= $rowPlan['price']; ?></span>
                        </td>
                    </tr>
	<?php
}
?>
				   
                </tbody>
            </table>
            
        </div>
		<br>
				<div class="col-md-12">
  <div class="block block-themed animated zoomIn boxshadow" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">

                <div class="block-header bg-corporate-dark">
				<h3 style="color: white;" class="block-title"><i class="fa fa-bullhorn"></i> Add Balance Logs</h3>

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
                                        $SQLGetMessages = $odb -> prepare("SELECT * FROM `addbalance` WHERE `username` = :username ORDER BY `id` DESC LIMIT 50");
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
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      