<?php 
$page = "verify";
session_start();
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);	
	
?>

 <main id="main-container" style="min-height: 911px;">
 <div class="content">
  <?php if (isset($error)) { echo $error; }elseif(isset($success)) { echo $success; } ?>
 <div class="row">
 <div class="col-xl-6">
            <div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-header bg-corporate-dark">
                    <h3 class="block-title"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> VerifyUser! </span></h3>
                    <div class="block-options"> 
                    </div>
                </div>
                <div class="block-content">
			 <form id="clickable-wizard" action="" method="POST" class="form-horizontal"> 
                                                 <div class="form-group"> 
												  <div class="col-12">
												  <div class="input-group">
                                                  <label class="col-2 col-form-label">Code</label>
                                                  <input type="text" name="secrectcode" placeholder="5 Digit Code" class="form-control" maxlength="5" >
                                                  </div>
												  </div>
												  </div>
										
											 <div class="form-group">
								                  <div class="col-12">
												   <div class="input-group">
                                                  <label class="col-2 col-form-label">Question 	</label>
                                                   <select name="question" class="form-control" data-placeholder="Choose a security question" style="width: 250px;">
                                                    <option value="1">What is your favorite sport?</option>
                                                                <option value="2">In what city were you born?</option>
                                                                <option value="3">What is the name of your first pet?</option>
                                                                <option value="4">What is your favorite color?</option>
                                                                <option value="5">In what county where you born?</option>
                                                </select>
												  </div>
												  </div>
												   </div>	
							
										
											 <div class="form-group">
								                  <div class="col-12">
												   <div class="input-group">
                                                  <label class="col-2 col-form-label">Answer</label>
                                                <input type="text" name="answer" placeholder="Your Answer here." class="form-control" maxlength="25">
                                              
												  </div>
												  </div>
												   </div>	
  <div class="form-group">
<h3>By Clicking ( <b>Verify</b> ) You <b> Agree To The Terms Of Service </b> </h3>
                                            </div>
											      <div class="form-group form-actions">
                                            <div class="col-md-12 col-md-offset-4">
                                            <button type="submit" name="updateBtn"id="next" class="btn btn-hero btn-rounded btn-noborder btn-primary mr-5 mb-5">
                                            <i class="fa fa-check mr-5"></i>Verify
                                             </button>
											 <a href="javascript:void(0)" class="btn btn-hero btn-rounded btn-noborder btn-danger mr-5 mb-5" onclick="logOutByRiPx()">
                                            <i class="fa fa-ban mr-5"></i>Exit
                                             </a>

                                            </div>
                                        </div>
                                                </form>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
<h3 style="color: white;" class="block-title"><i class="fa fa-bullhorn"></i> Latest News</h3>
</div>
<div class="block-content block-content-dark">
<ul class="list list-timeline list-timeline-modern pull-t">

	<?php 
							$SQLGetNews = $odb -> query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 4");
							while ($getInfo = $SQLGetNews -> fetch(PDO::FETCH_ASSOC)){
								$id = $getInfo['ID'];
								$title = $getInfo['title'];
							     $color = $getInfo['color'];

							    $icon = $getInfo['icon'];
								$content = $getInfo['content'];
								$date = date("m-d-Y, h:i:s a" ,$getInfo['date']);
								echo '
									  
									  
									  <li>
									  <div class="list-timeline-time">Posted By <span class="badge badge-danger">ADMIN</span></div>
<i class="list-timeline-icon '.$icon.' '.$color.'"></i>
<div class="list-timeline-content">
<p class="font-w700" style="background-color: transparent; text-shadow: 1px 1px 2px #409ce7;"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">RiP-Protocol </span> '.htmlspecialchars($title).'</p>
<p>'.htmlspecialchars($content).'</p>
</div>
</li>
';
							}
							?>
</ul>
</div>
</div>
</div>
</div>
</div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      