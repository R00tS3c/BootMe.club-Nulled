<?php
session_start();

$page='Api Access';
require_once 'header.php'; 
?>


<?php
	if(isset($_POST['gen_key'])){
		if(isset($_SESSION['username'])){
			genKey($_SESSION['username'], $odb);
			header('Location: api.php');
		}
	}
	if(isset($_POST['disable_key'])){
		if(isset($_SESSION['username'])){
			disableKey($_SESSION['username'], $odb);
			header('Location: api.php');
		}
	}

	function genKey($username, $odb){
		$newkey = generateRandomString(16);
		$stmt2 = $odb->query("UPDATE users SET apikey='$newkey' WHERE username='$username'");
	}
	function disableKey($username, $odb){
		$stmt2 = $odb->query("UPDATE users SET apikey='0' WHERE username='$username'");
	}
	function generateRandomString($length = 10){
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for($i=0;$i<$length;$i++){
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	$stmt = $odb->prepare("SELECT apikey FROM users WHERE username=:login");
	$stmt->bindParam("login", $_SESSION['username'], PDO::PARAM_STR);
	$stmt->execute();
	$key = $stmt->fetchColumn(0);
?>

  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title"><?php echo $page; ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#"><?php echo $sitename; ?></a></li>
            <li class="active"><?php echo $page; ?></li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->

      <!--/.row -->
      <!-- .row -->
	  <div class="widget-content">

</div> 
          <div class="white-box">
		  	<h3 class="box-title">Api URL</h3>
		  	<form method="POST">
		  		<?php if($key == '0'){?>
	            <input class="form-control" type="text" value="API is unavailable or api-key is disabled! Click 'Generate new api-key'." readonly="" style="color:black;">
	            <?php }else{?>
				<?php if($user->isVip($odb)){?>
	            <input class="form-control" type="text" value="https://blizzard-stresser.xyz/api/?key=<?php echo $key;?>&host=[IPv4/URL]&port=[PORT]&time=[SECONDS]&method=[METHOD/STOP]&vip=[1/0]&servers=[SERVERS]" readonly="" style="color:black;">
	            <?php }else{?>
				<input class="form-control" type="text" value="https://blizzard-stresser.xyz/api/?key=<?php echo $key;?>&host=[IPv4/URL]&port=[PORT]&time=[SECONDS]&method=[METHOD/STOP]&servers=[SERVERS]" readonly="" style="color:black;">
				<?php }?>
				<?php }?>
	            <br><button type="submit" class="btn btn-primary" name="gen_key">Generate new api-key</button> <button type="submit" class="btn btn-danger" name="disable_key">Disable api-key</button>
	        </form>
          </div>
<br><br>
<div id="faq1" role="tablist" aria-multiselectable="true">
	<div class="block block-bordered block-rounded mb-5">
		<div class="block-header" role="tab" id="faq1_h1">
			<a class="font-w600 text-body-color-dark" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1" aria-expanded="true" aria-controls="faq1_q1"><i class="fa fa-arrow-down"></i> For what is an API? (click for more..)</a>
		</div>
		<div id="faq1_q1" class="collapse" role="tabpanel" aria-labelledby="faq1_h1">
			<div class="block-content border-t">
				<p>You can use for the skype bot, your website, stresser or what you want!
Here, at low cost, you can create your own DDoS machine for stress!
Just a simple GET request to use our API.</p>
			</div>
		</div>
	</div>
	<div class="block block-bordered block-rounded mb-5">
		<div class="block-header" role="tab" id="faq2_h1">
			<a class="font-w600 text-body-color-dark" data-toggle="collapse" data-parent="#faq2" href="#faq2_q1" aria-expanded="true" aria-controls="faq2_q1"><i class="fa fa-arrow-down"></i> How to access the api? (click for more..)</a>
		</div>
		<div id="faq2_q1" class="collapse" role="tabpanel" aria-labelledby="faq2_h1">
			<div class="block-content border-t">
				<p>Simply buy Premium package and you will get access for free.</p>
			</div>
		</div>
	</div>
	<div class="block block-bordered block-rounded mb-5">
		<div class="block-header" role="tab" id="faq3_h1">
			<a class="font-w600 text-body-color-dark" data-toggle="collapse" data-parent="#faq2" href="#faq3_q1" aria-expanded="true" aria-controls="faq3_q1"><i class="fa fa-arrow-down"></i> Launch/stop a stress (click for more..)</a>
		</div>
		<div id="faq3_q1" class="collapse" role="tabpanel" aria-labelledby="faq3_h1">
			<div class="block-content border-t">
				<p>Send</p>
				<p>
				<code>
				Examples:<br>
				https://blizzard-stresser.xyz/api/?key=[KEY]&host=[IPv4/URL]&port=[PORT]&time=[SECONDS]&method=[METHOD/STOP]&vip=[1/0]&servers=[SERVERS]<br>
				https://blizzard-stresser.xyz/api/?key=[KEY]&host=0.0.0.0&port=80&time=30&method=NTP&vip=0&servers=1<br>
				https://blizzard-stresser.xyz/api/?key=[KEY]&host=https://example.com/&port=80&time=30&method=HTTP-HEAD&vip=0&servers=1
				</code>
				</p>
				<p>Stop</p>
				<p>
				<code>
				Examples:<br>
				https://blizzard-stresser.xyz/api/?key=[KEY]&host=[IPv4/URL]&port=[PORT]&time=[SECONDS]&method=STOP&vip=[1/0]&servers=[SERVERS]<br>
				https://blizzard-stresser.xyz/api/?key=[KEY]&host=0.0.0.0&port=80&time=30&method=STOP&vip=0&servers=1<br>
				https://blizzard-stresser.xyz/api/?key=[KEY]&host=https://example.com/&port=80&time=30&method=STOP&vip=0&servers=1
				</code>
				</p>
				<p>Note!</p>
				<p>
				<code>
				Replace [KEY] with an API-key which you can generate upper.<br>
				Last argument [SERVERS] means count of servers which you can use (just type a number, default: 1).<br>
				You can use vip=1 only if you are VIP. 
				</code>
				</p>
			</div>
		</div>
	</div>
</div>
	<div class="block block-bordered block-rounded mb-5">
		<div class="block-header" role="tab" id="faq6_h1">
			<a class="font-w600 text-body-color-dark" data-toggle="collapse" data-parent="#faq6" href="#faq6_q1" aria-expanded="true" aria-controls="faq6_q1"><i class="fa fa-arrow-down"></i> Available methods? (click for more..)</a>
		</div>
		<div id="faq6_q1" class="collapse" role="tabpanel" aria-labelledby="faq6_h1">
			<div class="block-content border-t">
							<p>Layer4:</p>
				<code>
				<p>CLDAP</p>
				<p>LDAP</p>
				<p>NTP</p>
				<p>MEM</p>
				<p>IMP</p>
				<p>SSDP</p>
				<p>KGB</p>
				<p>ESP</p>
				<p>ESSYN</p>
				<p>DNS</p>
				<p>XSYN</p>
				<p>ZSYN</p>
				</code>
							<p>Layer7:</p>
				<code>
				<p>HTTP-GET</p>
				<p>HTTP-POST</p>
				<p>HTTP-HEAD</p>
				<p>HTTP-NUKE</p>
				<p>HTTPS-GET</p>
				<p>HTTPS-POST</p>
				<p>HTTPS-HEAD</p>
				<p>HTTP-GOOGLE</p>
				<p>HTTP-NULL</p>
				</code>
			</div>
		</div>
	</div>
<br><br>

<?php

	require_once 'footer.php';
	
?>
