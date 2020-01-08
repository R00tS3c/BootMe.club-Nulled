<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "LoginLogs";
include 'header.php';
?>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
<div class="row">
<div class="col-lg-12">
<div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-ban"></i> Blacklist</h3>
</div>
<div class="block-content block-content-dark">
		<table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
						<thead>
								<tr>
									<th style="font-size: 12px;">id</th>
									<th style="font-size: 12px;">Username</th>
									<th style="font-size: 12px;">hostname</th>
									<th style="font-size: 12px;">Ip</th>
									<th style="font-size: 12px;">Useragent</th>
                                    <th style="font-size: 12px;">Country</th>									
									<th style="font-size: 12px;">city</th>
									<th style="font-size: 12px;">Date</th>
								</tr>
							</thead>
							<tbody style="font-size: 12px;">
							<?php
							$SQLGetLogs = $odb -> query("SELECT * FROM `loginlogss` ORDER BY `date` DESC LIMIT 10000000");
							while($show = $SQLGetLogs -> fetch(PDO::FETCH_ASSOC)){
							$username = $show['username'];
							$ip = $show['ip'];
							$country = $show['country'];
							$hostname = $show['hostname'];
							$results = $show['results'];
							$city = $show['city'];
							$http = $show['http'];
							$id = $show['id'];
							
                            $date = date("m-d-Y, h:i:s a" ,$show['date']);
								echo '<tr>
								      <td><strong><span class="badge badge-warning">'.htmlspecialchars($id).'</span></strong></td>
										<td><strong><span class="badge badge-primary">'.htmlspecialchars($username).'</span></strong></td>
										<td><strong><span class="badge badge-primary">'.htmlspecialchars($hostname).'</span></strong></td>
										<td><strong><span class="badge badge-danger">'.htmlspecialchars($ip).'</span></strong></strong><br></td>
										<td><strong><span class="badge badge-info">'.htmlspecialchars($http).'</span></strong></strong><br></td>
										<td><strong><span class="badge badge" style="color: #fff; background-color: rgba(0, 145, 254, 0.52); border-color: #ffc000">'.htmlspecialchars($country).'</span></strong></td>
										<td><strong><span class="badge badge" style="color: #fff; background-color: rgba(105, 85, 202, 0.7); border-color: #ffc000">'.htmlspecialchars($city).'</span></strong></td>
										<td>'.$date.'</td>
									  </tr>';
							}
							?>	
							</tbody>                                    
					</table>
						</div></div></div>
        </div>
    </div>
    </main>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
     