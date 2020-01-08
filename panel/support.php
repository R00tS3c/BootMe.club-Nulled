<?php 
session_start();

$page = "Invoices";
include 'header.php';
    $runningrip = $odb->query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0")->fetchColumn(0);
	$slotsx = $odb->query("SELECT COUNT(*) FROM `api` WHERE `slots`")->fetchColumn(0);
	$load    = round($runningrip / $slotsx * 100, 2);			
?>
 <main id="main-container" style="min-height: 531px;">
<div class="content">
  <div id="newticketalert" style="display:none"></div>
    <div class="row">
	
        <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                	<div class="block block-themed block-transparent remove-margin-b">
							<div class="block-header bg-primary-dark">
								<h3 class="block-title">Create a new ticket</h3>
								<i style="display: none;" id="icon" class="fa fa-cog fa-spin"></i>
							</div>
							<div class="block-content">
								<div id="div"></div>
								<form class="form-horizontal push-10-t push-10" action="base_forms_premade.html" method="post" onsubmit="return false;">
									<div class="form-group">
										<div class="col-xs-12">
											<div class="form-material floating">
												<input class="form-control" type="text" id="subject">
												<label for="subject">Subject</label>
											</div>
										</div>
									</div> 
									

									<div class="form-group">
                                <div class="col-xs-12">
                                    <div>
                                        <label for="department"><i class="si si-energy text-danger"></i> department</label>
                                        <select class="form-control" id="department" name="department">
                                                <option value="1">Choose a Department</option>
                                                <option value="Billing">Billing</option>
                                                <option value="General">General</option>
                                                <option value="Tech">Tech</option>
                                                <option value="Other">Other</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>

							<div class="form-group">
                                <div class="col-xs-12">
                                    <div>
                                        <label for="priority"><i class="si si-energy text-danger"></i> priority</label>
                                        <select class="form-control" id="priority" name="priority">
                                               <option value="2">Choose a Priority</option>
                                               <option value="Low">Low</option>
                                               <option value="Medium">Medium</option>
                                               <option value="High">High</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
									
									<div class="form-group row">
                            <label class="col-12" for="message">Message</label>
                            <div class="col-12">
                                <textarea class="form-control" id="message" name="message" rows="7" placeholder="Enter your message.."></textarea>
                            </div>
                        </div>

								 <div class="form-group form-actions">
                                                    <div class="col-xs-12 text-right">
                                                        <button class="btn btn-effect-ripple btn-primary" onclick="submitTicket()">Send</button>
                                                    </div>
                                                </div>
								</form>
							</div>
						</div>
                            </div>
                        </div>
                    </div>
        <div class="col-md-7 col-xl-7">
            <div class="block">
                <div class="block-header block-header-default">
          
                    <div class="block-options">

						  <button class="btn btn-effect-ripple btn-info" data-toggle="tooltip" title="Refresh The List" onclick="updateTickets()"><i class="fa fa-refresh"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </div>
                </div>
                <div class="block-content">

                        <div id="message-list">
                                <!-- Title -->
                                <div class="block-title clearfix">
                                    <div class="block-options pull-right">
                                       
                                        <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default">Last updated <i class="fa fa-reply"></i></a>
                                    </div>
                                 
                                </div>
                                <!-- END Title -->

                                <!-- Messages -->
                                <div class="block-content-full">
                                    <table class="table table-borderless table-striped table-vcenter remove-margin">
									          <thead>
                                        <tr>
                                            <th>Department</th>
											<th>Priority</th>
                                            <th>Subject</th>
                                            <th>System</th>
                                            <th>Date</th>
                                        
                                           
                                        </tr>
                                    </thead>
                                        <tbody id="ticketsdiv"> </tbody>
                                    </table>
                                </div>
                                <!-- END Messages -->
                            </div>
                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
    </main>
</div>
<script>
function updateTickets()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("ticketsdiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ripx/support.php?type=update",true);
xmlhttp.send();
}

window.setInterval(function(){updateTickets();}, 30000);
updateTickets();


function submitTicket()
{
var subject=$('#subject').val();
var message=$('#message').val();
var department=$('#department').val();
var ppp=$('#priority').val();

document.getElementById("newticketalert").style.display="none";
//document.getElementById("newticketloader").style.display="inline";
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("newticketalert").innerHTML=xmlhttp.responseText;
	//document.getElementById("newticketloader").style.display="none";
	document.getElementById("newticketalert").style.display="inline";
	if (xmlhttp.responseText.search("Ticket has been created.") != -1)
	{
	updateTickets();
    }
    }
  }
xmlhttp.open("POST","ripx/support.php?type=submit",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("message=" + message + "&subject=" + subject + "&department=" + department + "&ppp=" + ppp);
}
</script>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      