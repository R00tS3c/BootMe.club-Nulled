<?php 

session_start();
$page = "AdminSupport";
include 'header.php';
?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
<div class="row">
<div class="col-lg-12">
<div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-ban"></i> Support</h3>
</div>
<div class="block-content block-content-dark">
		<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
						<thead>
								<tr>
									<th style="font-size: 12px;">Username</th>
									<th style="font-size: 12px;">Subject</th>
									<th style="font-size: 12px;">Priority</th>
									<th style="font-size: 12px;">Status</th>
									<th style="font-size: 12px;">Department</th>
									<th style="font-size: 12px;">Last Update</th>
									<th style="font-size: 12px;">Vies</th>
								</tr>
							</thead>
							<tbody style="font-size: 12px;">
							<?php 
            $SQLGetTickets = $odb -> prepare("SELECT * FROM `tickets` ORDER BY `status` DESC");
            $SQLGetTickets -> execute(array(':status' => 'Waiting for admin response'));
            while ($getInfo = $SQLGetTickets -> fetch(PDO::FETCH_ASSOC))
            {
                $id = $getInfo['id'];
                $username = $getInfo['username'];
                $subject = $getInfo['subject'];
                $status = $getInfo['status'];
                $priority = $getInfo['priority'];
                $department = $getInfo['department'];
                $time = date('Y-m-d h:i:s', $getInfo['time']);

             if ($priority == "Low") {
             $priority1 = '<span class="label label-info">Low</span>';
             } elseif ($priority == "Medium") {
             $priority1 = '<span class="label label-warning">Medium</span>';
             } elseif ($priority == "High") {
             $priority1 = '<span class="label label-danger">High</span>';
             }


                echo '<tr><td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$username.'</span></td><td><span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">'.htmlspecialchars($subject).'</span></td><td><span class="badge badge-primary">'.$priority1.'</span></td><td><span class="badge badge-primary">'.$status.'</span></td><td><span class="badge badge-danger">'.$department.'</span></td><td><span class="badge badge-success">'.$time.'</span></td> <td width="50px"><a href="ticket.php?id='.$id.'"><button type="submit" class="btn btn-warning">View</button></a></td></tr>';
            }
            ?>
							</tbody>                                    
					</table>
						</div></div></div>
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
     
