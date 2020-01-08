<?php 
session_start();

   $page='TransferMoney';
   include 'header.php';
?>

 <main id="main-container" style="min-height: 911px;">
  <div class="content">
   <?php if (isset($error)) { echo $error; }elseif(isset($success)) { echo $success; } ?>
   <div class="row">
 <div class="col-xl-4">
            <div class="block block-themed" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-header bg-corporate-dark">
                    <h3 class="block-title"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> Transfer Money! </span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                    </div>
                </div>
                <div class="block-content">
				 <form class="form-horizontal" id="loginform" method="post">
                                        <div class="form-horizontal">
                                            <div class="form-group ">
                                                   <div class="form-group row">
                            <div class="col-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter the username you want to send the money to."  autocomplete="off">
                            </div>
                            <div class="col-6">
                                <label for="sender">From</label>
                                <input type="text" class="form-control" id="sender" name="sender" placeholder="Anonymous, Test, <?php echo $_SESSION['username']; ?>.." value="<?php echo $_SESSION['username']; ?>" autocomplete="off">
                            </div>
                        </div>
                                                <br>
                                                <div class="form-group">
                                                    <div class="form-group">
                                <label class="control-label">Enter the amount you'd like to send </label>
                                <input id="money" type="text" value="1" name="money" data-bts-min="1" data-bts-max="150" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-primary btn-trans waves-effect w-md waves-info m-b-5" data-bts-button-up-class="btn btn-success"> Your Balance: <span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;"><?php echo number_format((float)$balance, 2, '.', ''); ?>$</span>
                            </div>
                        <div class="form-group row">
                            <label class="col-12" for="messagex">Message</label>
                            <div class="col-12">
                                <textarea class="form-control" id="messagex" name="messagex" rows="7" placeholder="Enter your message.."></textarea>
                            </div>
                        </div>
                                                    <div class="form-group form-actions">
                                                        <div class="col-xs-8">
                                                        </div>
                                                        <div class="form-group text-center m-t-20">
                                                            <div class="col-12 mb-10">
															  <button type="submit" name="transfermoney" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">
                                                                    <i class="fa fa-bolt"></i> Send Money
                                                                </button>
                                                    <br>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '😼'">😼</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '😿'">😿</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '👻'">👻</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '☄️'">☄️</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '🔥'">🔥</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '💲'">💲</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '♥️'">♥️</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '👩🏻‍💻'">👩🏻‍💻</button>
								<button type="button" class="btn btn-sm btn-outline-primary ml-5" onclick="document.getElementById('messagex').value += '😄'">😄</button>
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '😍'">😍</button> 
								<button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('messagex').value += '🤑'">🤑</button> 
								
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </form>
                </div>
            </div>
        </div>
		
		
 <div class="col-md-8">
  <div class="block block-themed animated zoomIn boxshadow" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
                <div class="block-header bg-corporate-dark">
<div class="font-w600 text-white">
<i class="fa fa-money fa-spin text-primary"></i>
<bb style="border-bottom: thin dotted red;"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> Transfers! </span></bb>
</div>
</div>
<div class="block-content block-content-dark">
                                <table class="table">
                                <thead>
                                   <tr>
                                   <th  style="font-size: 12px;">To</th>
                                   <th  style="font-size: 12px;">Money sent</th>
                                   <th  style="font-size: 12px;">Sender</th>
                                   <th  style="font-size: 12px;">Message</th>
                                   <th  style="font-size: 12px;">Date</th>
                                   </tr>
                                   </thead>
                                <tbody>
                                    <?php
                                        $SQLGetMessages = $odb -> prepare("SELECT * FROM `transfers` WHERE `sender` = :username or `receiver` = :receiver ORDER BY date LIMIT 8");
                                        $SQLGetMessages -> execute(array(':username' => $_SESSION['username'], ':receiver' => $_SESSION['username']));

                                        while ($show = $SQLGetMessages -> fetch(PDO::FETCH_ASSOC)){
                                        $sernder = $show['sender'];
                                        $receiver = $show['receiver'];
                                        $amountsent = $show['amountsent'];
                                        $usermessage = $show['message'];
                                        $datesent = date("h-i-s", $show['date']);  
    
	                                    if ($receiver == $_SESSION['username']){
											$receiverx = '<span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;"> Me</span>';
										}else{
											$receiverx = '<span class="badge" style="background: linear-gradient(135deg, #eab000 0, rgba(255, 202, 40, 0.37) 100%)!important;">'.$receiver.'</span>';
										}
                                        echo '<tr>
                                        <td>'.$receiverx.'</td>
                                        <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$amountsent.'$</span></td>
                                        <td><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;"> '.$sernder.'</span></td>
                                        <td>'.$usermessage.'</td>
                                        <td>'.$datesent.'</td>
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
</div>
    </main>
</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>