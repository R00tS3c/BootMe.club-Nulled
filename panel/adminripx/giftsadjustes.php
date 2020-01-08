<?php 
session_start();
$page = "GiftSettings";
include 'header.php';
date_default_timezone_set('America/New_York');	

if(isset($_POST['submitchances'])){
    

    if(empty($_POST['chances']) and empty($_POST['giftsystem'])){
       $error = error('Fill In All Fields'); 
    }
            
   
if(empty($error)){
         $updated = false; 
    
		if ($chances != $_POST['chances']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `giftchances` = :giftchances");
			$SQL -> execute(array(':giftchances' => $_POST['chances']));
			$chances = $_POST['chances'];
			$updated = true;
		}

		
		if ($giftsystem != $_POST['giftsystem']){
			$SQL = $odb -> prepare("UPDATE `settings` SET `giftsystem` = :giftsystem");
			$SQL -> execute(array(':giftsystem' => isset($_POST['giftsystem']) ? 1 : 0));
			$giftsystem = $_POST['giftsystem'];
			$updated = true;
		}	
		
		if($updated == true){
			$done = success("Gift System settings have been updated");
		}
	}
}
	
	
		?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">  
  <div class="content"> 
<?php
if(isset($done)){
    echo $done;
}elseif(isset($error)){
    echo $error;
}
?>  
<div class="row">
<div class="col-md-7" data-select2-id="9">
            <form class="form-horizontal push-10-t" method="post">
                <div class="block block-rounded block-themed" data-select2-id="7">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">Gift Won Logs</h3>
                    </div>
                    <div class="block-content block-content-full" data-select2-id="6">
             		<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
						<thead>
								<tr>
									<th style="font-size: 12px;">id</th>
									<th style="font-size: 12px;">Username</th>
									<th style="font-size: 12px;">Date</th>
								</tr>
							</thead>
							<tbody style="font-size: 12px;">
							<?php
							$SQLGetLogs = $odb -> query("SELECT * FROM `dailygiftwon` ORDER BY `date` DESC LIMIT 1000");
							while($show = $SQLGetLogs -> fetch(PDO::FETCH_ASSOC)){
							$username = $show['user'];
							$date = $show['date'];
							$id = $show['id'];
							
                            $date = date("m-d-Y, h:i:s a" ,$date);
								echo '<tr>
								      <td><strong><span class="badge badge-warning">'.htmlspecialchars($id).'</span></strong></td>
										<td><strong><span class="badge badge-primary">'.htmlspecialchars($username).'</span></strong></td>
										<td><strong><span class="badge badge-primary">'.htmlspecialchars($amount).'</span></strong></td>
										<td>'.$date.'</td>
									  </tr>';
							}
							?>	
							</tbody>                                    
					</table>
                                         
                    </div>
                </div>
            </form>
        </div>
        
        
		<div class="col-md-5">
            <form action="" method="post">
                <div class="block block-rounded block-themed">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">Edit Gift System</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="form-group row">
                            <label class="col-12">Enable Gift System</label>
                            <div class="col-12">
                                <label class="css-control css-control-success css-switch">
                                    <input class="css-control-input" type="checkbox" name="giftsystem" id="giftsystem" <?php echo ($giftsystem== "1" ? " checked" : ""); ?> data-plugin="switchery" data-color="#03bf06" data-secondary-color="#d80d0d" data-size="small" />
                                    <span class="css-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-material">
                                <label for="google_site">Gift Chances</label>
                                    <input class="form-control text-success" style="border-color: #dcdfe3; border-radius: 3px; background-color: #1E2125;" type="text" id="google_site" name="chances" value="<?php echo htmlspecialchars($chances); ?>" placeholder="Chances to win gift">
                                </div>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <div class="col-sm-12">
                            <button type="submit" name="submitchances" value="do" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Update
                            </button>
                            </div>
                        </div>
                        
                                                                        
                    </div>
                </div>
            </form>
        </div>
		
</div>
</div>

<!-- END Main Container -->
    </main>

<?php include('footer.php'); ?>
