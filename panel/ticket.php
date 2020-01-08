<?php 

session_start();
$page = "Ticket";
require_once 'header.php'; 

	if(is_numeric($_GET['id']) == false) {
		header('Location: support.php');
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

	if ($username != $_SESSION['username']){
		header('Location: support.php');
		exit;
	}

	if ($user -> safeString($original)){
		header('Location: support.php');
		exit;
	}
	
?>

 <main id="main-container" style="min-height: 911px;">
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
													$('#live_servers').load('ripx/tickets/tickets.php?id=<?php echo $_GET['id']; ?>').fadeIn("slow");
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
												<button class="btn btn-sm btn-success" onclick="message()">
													<i class="fa fa-plus push-5-r"></i> Reply to ticket
												</button>
												<button class="btn btn-sm btn-danger" onclick="closeticket()">
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
			
			response();
			
			function response(){
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
				xmlhttp.open("GET","ripx/tickets/tickets.php?id=<?php echo $_GET['id']; ?>",true);
				xmlhttp.send();
			}
			
			function closeticket(){
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
				xmlhttp.open("GET","ripx/tickets/closeticket.php?id=<?php echo $_GET['id']; ?>",true);
				xmlhttp.send();
			}
				
			function message() {
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
							response();
						}
					}
				}
				xmlhttp.open("GET","ripx/tickets/reply.php?id=<?php echo $_GET['id']; ?>" + "&message=" + reply,true);
				xmlhttp.send();
			}
			
			</script>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      