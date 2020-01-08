<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Ticket";
include 'header.php';


	if(is_numeric($_GET['id']) == false) {
		header('Location: home.php');
		exit;
	}
	
	$SQLCount = $odb -> query("SELECT COUNT(*) FROM `tickets` WHERE `id` = '{$_GET['id']}'");
	if($SQLCount->fetchColumn(0) == 0){
		header('Location: home.php');
		exit;
	}
	
	$SQLGetTickets = $odb -> query("SELECT * FROM `tickets` WHERE `id` = {$_GET['id']}");
	while ($getInfo = $SQLGetTickets -> fetch(PDO::FETCH_ASSOC)){
		$username = $getInfo['username'];
    $subject = $getInfo['subject'];
    $status = $getInfo['status'];
    $department = $getInfo['department'];
     $priority = $getInfo['priority'];
     $original = $getInfo['content'];
		$date = date("m-d-Y, h:i:s a" ,$getInfo['time']);
	}
	
	

?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
  <div class="content">
       <div class="row">  
						<div class="col-lg-12" id="div"></div>
						
						
						
						
						
						
						
						
						
						<div class="col-lg-6">

                <div class="block block-rounded block-themed">

                    <div class="block-header bg-gd-primary">

                        <h3 class="block-title"><i class="fa fa-comments"></i> <span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">Subject: <?php echo htmlentities($subject); ?>  </span>
						<span class="badge badge-danger"><strong> Department:</strong> <?php echo htmlentities($department); ?></span>
						<span class="badge badge-warning"><strong> Priority:</strong> <?php echo htmlentities($priority); ?></span>
						<span class="badge badge-success"><strong> Status:</strong> <?php echo htmlspecialchars($status); ?></span>
						<span class="badge badge-primary"><strong> User:</strong> <?php echo htmlentities($username); ?></span>
      </h3>

                    </div>
                     <div class="block-content">
					<blockquote class="blockquote-reverse">
										<h5><?php echo htmlentities($original); ?></h5>
										<footer><?php echo $username . ' [ ' . $date . ' ]'; ?></footer>
									</blockquote>
													<script type="text/javascript">
													var auto_refresh = setInterval(
													function ()
													{
													$('#live_servers').load('tickets/view.php?id=<?php echo $_GET['id']; ?>').fadeIn("slow");
													}, 1000);
													</script>

					<div id="live_servers"></div>

					</div>

                </div>

            </div>
					
			<div class="col-lg-6">
                <div class="card">
                 <div class="card-body">    
                  <div class="block">  
                    <div class="block block-rounded block-themed">

                    <div class="block-header bg-gd-primary">
                      <h3 class="block-title"><i class="fa fa-mail-reply"></i> Post a reply
                        <i style="display: none;" id="image" class="fa fa-cog fa-spin"></i>
                         </h3>
                        </div>
                                <div class="block-content">
									<form class="form-horizontal push-10-t push-10" action="base_forms_premade.html" method="post" onsubmit="return false;">
										<div class="form-group">
											<div class="col-xs-12">
												<div class="form-material floating">
													<textarea class="form-control" id="reply" rows="8"></textarea>
													<label for="reply">Your reply</label>
												</div>
											</div>
										</div>                         
                                        <div class="form-group">
                                            <div class="col-xs-12 text-center">                                             
												<button class="btn btn-sm btn-success" onclick="doReply()">
													<i class="fa fa-plus push-5-r"></i> Reply to ticket
												</button>
												<button class="btn btn-sm btn-danger" onclick="doClose()">
													<i class="fa fa-ban push-5-r"></i> Close ticket
												</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>  

                            </div>
						
                            </div>
                        </div>
                    </div>
                    </div>     
    </div>
<script>		
			view();
			
			function view(){
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("response").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","tickets/view.php?id=<?php echo $_GET['id']; ?>",true);
				xmlhttp.send();
			}
			
			function doClose(){
				document.getElementById("image").style.display="inline"; 
				document.getElementById("div").style.display="none"; 
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("div").style.display="inline";
						document.getElementById("image").style.display="none";
					}
				}
				xmlhttp.open("GET","tickets/close.php?id=<?php echo $_GET['id']; ?>",true);
				xmlhttp.send();
			}
				
			function doReply() {
				var reply=$('#reply').val();
				document.getElementById("image").style.display="inline"; 
				document.getElementById("div").style.display="none"; 
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("div").style.display="inline";
						document.getElementById("image").style.display="none";
						if (xmlhttp.responseText.search("SUCCESS") != -1) {
							view();
						}
					}
				}
				xmlhttp.open("GET","tickets/reply.php?id=<?php echo $_GET['id']; ?>" + "&message=" + reply,true);
				xmlhttp.send();
			}
			
			</script>
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

