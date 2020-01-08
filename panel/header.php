<?php
require "inferno/anti-ddos-lite.php";
require_once 'rip/configuration.php';
require_once 'rip/init.php';

if (!$user -> LoggedIn()){
    header('Location: login.php');
    exit;
}

function hasBNAccess($db){
	$stmt = $db->prepare("SELECT botnet FROM users WHERE username=:login");
	$stmt->bindParam("login", $_SESSION['username'], PDO::PARAM_STR);
	$stmt->execute();
	$value = $stmt->fetchColumn(0);
	return $value;
}
$lastactive = $odb -> prepare("UPDATE `users` SET activity=UNIX_TIMESTAMP() WHERE username=:username");
$lastactive -> execute(array(':username' => $_SESSION['username']));

 $onedayago = time() - 86400;

 $twodaysago = time() - 172800;
 $twodaysago_after = $twodaysago + 86400;

 $threedaysago = time() - 259200;
 $threedaysago_after = $threedaysago + 86400;

 $fourdaysago = time() - 345600;
 $fourdaysago_after = $fourdaysago + 86400;

 $fivedaysago = time() - 432000;
 $fivedaysago_after = $fivedaysago + 86400;

 $sixdaysago = time() - 518400;
 $sixdaysago_after = $sixdaysago + 86400;

 $sevendaysago = time() - 604800;
 $sevendaysago_after = $sevendaysago + 86400;
 
 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` > :date");
 $SQL -> execute(array(":date" => $onedayago));
 $count_one = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $twodaysago, ":after" => $twodaysago_after));
 $count_two = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $threedaysago, ":after" => $threedaysago_after));
 $count_three = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $fourdaysago, ":after" => $fourdaysago_after));
 $count_four = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $fivedaysago, ":after" => $fivedaysago_after));
 $count_five = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $sixdaysago, ":after" => $sixdaysago_after));
 $count_six = $SQL->fetchColumn(0);

 $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after");
 $SQL -> execute(array(":before" => $sevendaysago, ":after" => $sevendaysago_after));
 $count_seven = $SQL->fetchColumn(0);
 
 $date_one = date('d/m/Y', $onedayago);
 $date_two = date('d/m/Y', $twodaysago);
 $date_three = date('d/m/Y', $threedaysago);
 $date_four = date('d/m/Y', $fourdaysago);
 $date_five = date('d/m/Y', $fivedaysago);
 $date_six = date('d/m/Y', $sixdaysago);
 $date_seven = date('d/m/Y', $sevendaysago);

     $plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
     $plansql -> execute(array(":id" => $_SESSION['ID']));
     $row = $plansql -> fetch(); 
     $date = date("m-d-Y, h:i:s a", $row['expire']);
     if (!$user->hasMembership($odb)){
         $row['mbt'] = 0;
         $row['concurrents'] = 0;
         $row['name'] = 'No membership';
         $date = '0-0-0';
     }
     
     $SQL = $odb -> prepare("SELECT * FROM `users` WHERE `username` = :usuario");
             $SQL -> execute(array(":usuario" => $_SESSION['username']));
             $balancebyripx = $SQL -> fetch();
             $balance = $balancebyripx['balance'];
     
 
?>

<!doctype html>
<html lang="en" class="no-focus"><!--<![endif]--><head>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
 <link href="assets/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

        <title><?php echo $sitename; ?> | <?php echo $page; ?></title>

        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
        <link rel="stylesheet" href="assets/js/plugins/jquery-jvectormap/jquery-jvectormap.min.css">
        <link rel="stylesheet" id="css-main" href="assets/css/animations.css">
		<link rel="stylesheet" href="assets/js/plugins/magnific-popup/magnific-popup.css">
        <link href="assets/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/js/plugins/jquery-jvectormap/jquery-jvectormap.min.css">
		<link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
		<script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="assets/node_modules/sweetalert2/dist/sweetalert2.min.css">
 
    </head>
<body class="" style="">
  <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed page-header-modern main-content-boxed">



<button type="button" id="xd" class="btn btn-alt-warning" onclick="Codebase.loader('show', 'bg-gd-dusk');setTimeout(function(){Codebase.loader('hide');},300);"></button>

<script>
//js encrypted for security
eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('0=3(2(){1.4(\'5\').7();6(0)},8);',9,9,'SendPop|document|function|setTimeout|getElementById|test|clearTimeout|click|100'.split('|'),0,{}))
</script>

    <aside id="side-overlay">
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 969px;"><div id="side-overlay-scroll" style="overflow: hidden; width: auto; height: 969px;">
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <div class="content-header-item">
                    <a class="img-link mr-5" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar11.jpg" alt="">
                    </a>
                    <a class="align-middle link-effect text-body-color-dark font-w600" href="javascript:void(0)">Dr. Stone</a>
                </div>
            </div>
        </div>
		
		                         <?php
$amount = $odb->prepare("SELECT COUNT(*) FROM tickets WHERE lastreply = ?");
$amount->execute(array("user"));
if($amount->fetchColumn() == 0){
echo "";
}
else
{
echo ' <div class="content-side content-side-full bg-danger-light text-center">
            <i class="fa fa-exclamation-triangle fa-2x text-danger animated swing infinite"></i>
            <p class="font-size-h5 font-w700 text-danger mt-10 mb-0">
                There is an emergency, please proceed to surgery immediately!
            </p>
        </div>';
}

?>  
        <div class="content-side">
            <div class="block pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Patients</div>
                            <a class="link-effect font-w600 font-size-h4" href="javascript:void(0)">5</a>
                        </div>
                        <div class="col-6">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Appointments</div>
                            <a class="link-effect font-w600 font-size-h4" href="javascript:void(0)">6</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">Recent Notifications</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <ul class="list list-activity">
                        <li>
                            <i class="fa fa-exclamation-triangle text-danger"></i>
                            <div class="font-w600">There is an emergency!</div>
                            <div>
                                <a class="font-w600 text-danger" href="javascript:void(0)">Event Details</a>
                            </div>
                            <div class="font-size-xs text-muted">just now</div>
                        </li>
                        <li>
                            <i class="fa fa-check text-success"></i>
                            <div class="font-w600">New patient was added successfully</div>
                            <div>
                                <a class="font-w600 text-success" href="javascript:void(0)">Brian Stevens</a>
                            </div>
                            <div class="font-size-xs text-muted">15 min ago</div>
                        </li>
                        <li>
                            <i class="fa fa-pencil text-info"></i>
                            <div class="font-w600">You edited a file</div>
                            <div>
                                <a class="font-w600 text-info" href="javascript:void(0)">
                                    <i class="fa fa-file-text-o"></i> Prescription#2.doc
                                </a>
                            </div>
                            <div class="font-size-xs text-muted">1 day ago</div>
                        </li>
                        <li>
                            <i class="fa fa-paypal text-primary"></i>
                            <div class="font-w600">New payment received!</div>
                            <div>
                                From <a class="font-w600" href="javascript:void(0)">Brian Stevens</a>
                            </div>
                            <div class="font-size-xs text-muted">1 day ago</div>
                        </li>
                        <li>
                            <i class="fa fa-check text-success"></i>
                            <div class="font-w600">New appointment was scheduled successfully</div>
                            <div>
                                Tomorrow with <a class="font-w600 text-success" href="javascript:void(0)">Barbara Scott</a>
                            </div>
                            <div class="font-size-xs text-muted">2 days ago</div>
                        </li>
                    </ul>
                    <a class="btn btn-block btn-alt-secondary" href="javascript:void(0)">
                        Load more..
                    </a>
                    <a class="btn btn-block btn-hero btn-alt-primary" href="javascript:void(0)">
                        <i class="fa fa-flag mr-5"></i>
                        View All Notifications
                    </a>
                </div>
            </div>
        </div>
    </div><div class="slimScrollBar" style="background: rgb(205, 205, 205); width: 4px; position: absolute; top: 0px; opacity: 0.9; display: none; border-radius: 7px; z-index: 99; right: 0px; height: 969px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 1; z-index: 90; right: 0px;"></div></div>

</aside>
<?php ${"\x47L\x4f\x42AL\x53"}["\x73\x79\x73w\x74\x72x\x65\x69\x70\x62"]="\x74\x6a\x77mq\x64\x71\x62\x75";${"\x47\x4cO\x42\x41\x4c\x53"}["j\x6ey\x69\x74\x67\x74\x77\x75"]="d\x62\x6c\x70uka\x68\x72";${"GL\x4f\x42\x41\x4c\x53"}["\x67\x68\x6dw\x6ey"]="\x6bsg\x77\x77\x65";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x62\x6di\x71\x75j\x68"]="\x64\x70\x64s\x73\x70\x66\x69\x68";${"G\x4c\x4f\x42\x41\x4c\x53"}["c\x70y\x62\x6cd\x67\x76"]="\x6c\x70\x67\x75\x66\x70o\x66\x61";${"\x47\x4c\x4f\x42\x41L\x53"}["t\x6e\x66\x64u\x6fp\x74\x6a\x79"]="\x74\x6f\x78n\x6c\x71\x77\x6c\x6f\x78\x73";${"\x47LOBA\x4c\x53"}["\x6e\x6a\x6cq\x67\x6efl"]="\x6f\x69\x6ey\x6b\x67\x6e\x63\x72\x6c\x66\x7a";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6e\x77\x67\x66\x79\x67"]="\x6d\x73\x6a\x73\x67\x70";${"\x47\x4c\x4f\x42A\x4c\x53"}["\x6a\x6c\x71\x72\x6a\x6f\x6bj\x6dq\x6f"]="\x7a\x71\x63\x6a\x68\x61\x71";${"G\x4c\x4fB\x41\x4cS"}["h\x66t\x64\x66\x78\x79\x68"]="\x76\x6c\x73h\x68\x6a\x78\x68\x72\x6c";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["i\x6d\x6f\x6d\x68\x73\x67"]="\x65\x78\x70\x69\x72\x65\x73\x64\x61\x74\x65";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x74\x7a\x65\x76\x76\x75\x6f"]="\x75\x73\x65\x72\x6e\x61\x6d\x65\x53\x51\x4c";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6d\x74\x79\x6c\x7a\x75\x71\x62\x64"]="\x70\x6c\x61\x6e\x49\x6e\x66\x6f\x44\x61\x74\x61\x78";${"\x47\x4c\x4f\x42\x41\x4cS"}["\x71\x6fo\x72\x66gs\x67"]="\x76\x6c\x73\x68\x68\x6ax\x68\x72\x6c";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x74h\x6c\x69\x69\x64\x6b\x7a\x6c"]="u\x73\x65r\x49\x6e\x66\x6f\x78";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x62\x69\x77\x6d\x73\x6a\x6d\x65\x7a\x72"]="u\x73\x65\x72\x49\x6e\x66\x6fDa\x74\x61x";${"\x47\x4c\x4f\x42A\x4c\x53"}["\x69\x62\x72\x6e\x79\x73\x6c\x64"]="\x53Q\x4c\x55\x70\x64a\x74\x65";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67\x77\x73l\x78\x72\x72\x6b\x73"]="\x67\x69\x66\x74";${"\x47L\x4f\x42\x41\x4c\x53"}["l\x6c\x71\x6a\x79\x6f"]="\x75\x73\x65\x72\x47\x69\x66\x74";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["c\x6a\x79\x76\x6c\x75h\x74\x71\x6d\x73"]="\x72\x61\x6e\x64\x47ift";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6a\x71\x74\x64\x71\x66\x63\x61\x73\x76\x64"]="\x67e\x74\x44\x61\x69\x6c\x79\x47\x69\x66\x74\x44\x61\x74a";${"\x47\x4c\x4f\x42\x41L\x53"}["v\x71\x79\x72\x64\x72\x72\x76\x75"]="\x63\x6f\x75\x6e\x74";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["h\x66\x74\x64\x66\x78\x79\x68"]}="c\x6f\x75\x6e\x74";${"G\x4c\x4f\x42\x41\x4c\x53"}["\x67\x69\x6a\x6a\x6d\x65\x67\x65"]="\x53\x51\x4c";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67\x69\x6a\x6a\x6d\x65\x67e"]}=$odb->prepare("\x53\x45\x4c\x45\x43\x54\x20\x43\x4fU\x4e\x54(*)\x20\x46\x52\x4f\x4d\x20\x60\x75\x73\x65\x72s`\x20\x57\x48\x45\x52\x45\x20\x60\x75\x73\x65\x72\x6e\x61\x6de\x60\x20\x3d\x20:\x75\x73\x65\x72\x6e\x61\x6d\x65\x20\x41\x4e\x44\x20\x60\x64\x61i\x6c\x79\x67\x69\x66\x74\x64\x61\x74e\x60\x20\x3c\x20\x55N\x49\x58\x5f\x54\x49\x4d\x45\x53\x54\x41\x4d\x50(N\x4f\x57())");$SQL->execute(array(":\x75s\x65\x72\x6e\x61\x6d\x65"=>$_SESSION["\x75\x73\x65\x72\x6e\x61\x6d\x65"]));${${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x71\x6f\x6f\x72\x66\x67\x73\x67"]}}=$SQL->fetchColumn(0);if(${${"\x47\x4c\x4f\x42\x41LS"}["\x76\x71\x79\x72\x64\x72\x72\x76\x75"]}=="\x31"){${"G\x4c\x4f\x42\x41L\x53"}["c\x6f\x61\x71i\x6c\x76r\x6a\x68\x76q"]="\x64\x62\x6cp\x75\x6ba\x68r";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67n\x6d\x6b\x6e\x69\x73\x76"]="\x53\x51\x4c\x55\x70\x64\x61\x74\x65";${"\x47\x4c\x4fB\x41\x4c\x53"}["\x6e\x62\x64\x74\x6fc\x69\x64\x6a"]="\x75\x73\x65\x72\x47i\x66\x74";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["b\x70\x69\x65\x7ad\x62r\x71"]="\x72a\x6e\x64\x47i\x66\x74";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x75\x77\x65\x78\x69\x62\x75\x6f"]="\x65\x78p\x69\x72\x65\x73\x64a\x74\x65";${${"\x47L\x4fB\x41L\x53"}["\x63\x6fa\x71\x69\x6c\x76r\x6a\x68\x76q"]}="\x7a\x71cj\x68a\x71";${${"\x47\x4cOBA\x4c\x53"}["\x6al\x71\x72\x6a\x6f\x6b\x6a\x6d\x71\x6f"]}="\x65\x78\x70\x69\x72\x65\x73\x64\x61\x74e";${${${${"G\x4cO\x42\x41\x4c\x53"}["\x6a\x6e\x79\x69t\x67\x74\x77\x75"]}}}=strtotime("\x31\x20\x64\x61\x79",time());${${"\x47\x4c\x4fB\x41\x4c\x53"}["\x67\x6e\x6d\x6b\x6e\x69\x73\x76"]}=$odb->prepare("\x55\x50\x44\x41\x54\x45\x20\x60\x75\x73e\x72\x73\x60 \x53\x45\x54 \x60\x64\x61\x69\x6cyg\x69\x66\x74d\x61\x74\x65`\x3d :\x64\x61\x69\x6c\x79\x64\x61\x74\x65\x20\x57\x48\x45\x52\x45\x20\x60\x75\x73\x65\x72\x6ea\x6d\x65\x60\x20\x3d :\x75\x73\x65\x72\x6e\x61m\x65");$SQLUpdate->execute(array(":\x75\x73\x65\x72\x6ea\x6d\x65"=>$_SESSION["\x75\x73\x65\x72n\x61\x6d\x65"],":\x64\x61\x69\x6c\x79\x64\x61t\x65"=>${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x75\x77\x65\x78\x69b\x75\x6f"]}));${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x62\x70\x69\x65\x7a\x64\x62\x72\x71"]}=rand(1,500);${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6aq\x74\x64\x71\x66c\x61\x73\x76\x64"]}=$odb->prepare("S\x45\x4c\x45CT\x20*\x20\x46R\x4fM\x20\x60\x64\x61i\x6c\x79\x67\x69\x66t\x60\x20W\x48\x45\x52\x45\x20\x60\x6e\x75\x6d\x62\x65\x72`\x20\x3d\x20:nu\x6d\x62\x65\x72");${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x77\x75\x73\x78\x61\x6a\x71\x76\x69\x6e\x62"]="\x72\x61nd\x47\x69\x66\x74";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x77\x78\x75\x6b\x79\x67\x7a"]="\x75\x73\x65r\x47\x69\x66t";$getDailyGiftData->execute(array(":\x6e\x75\x6db\x65\x72"=>${${"G\x4c\x4fB\x41\x4c\x53"}["\x63\x6a\x79\x76\x6c\x75\x68\x74\x71\x6d\x73"]}));${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x77x\x75\x6b\x79\x67\x7a"]}=$getDailyGiftData->fetch(PDO::FETCH_ASSOC);if(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6e\x62\x64\x74\x6f\x63\x69d\x6a"]}["\x6e\x75\x6d\x62\x65\x72"]!=${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x77\x75\x73x\x61\x6a\x71\x76\x69\x6e\x62"]}){echo"\x3c\x73\x63\x72\x69\x70\x74\x3e";echo"\x73w\x61\x6c(\n\x20\x20\x22\x4f\x6f\x70\x73\x21\x22,\n\x20\x20\"\x59\x6f\x75\x20d\x6f\x6e\x27\x74\x20\x72\x65\x63\x65\x69\x76e\x20\x61\x6e\x79\x74\x68\x69\x6e\x67\x20\x74\x6f\x64\x61\x79\x21\x22,\n\x20 \x22\x65\x72\x72o\x72\"\n)";echo"\x3c/\x73c\x72\x69\x70\x74\x3e";}elseif(${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x6c\x6cq\x6a\x79\x6f"]}["\x6e\x75\x6d\x62\x65r"]==${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x63\x6a\x79\x76\x6c\x75\x68\x74\x71\x6d\x73"]}){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67\x63\x6d\x72\x75\x79j"]="\x74\x6f\x78\x6el\x71\x77\x6c\x6f\x78s";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["n\x77\x67\x66\x79\x67"]}="\x74\x6f\x74\x61\x6c\x6d\x6f\x6e\x65\x79";${"\x47\x4c\x4f\x42\x41L\x53"}["\x72k\x67r\x63\x6a\x76y"]="\x64\x70\x64s\x73\x70\x66\x69\x68";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67\x77\x73\x6c\x78\x72\x72k\x73"]}=str_replace("\$","",${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x6c\x6cq\x6a\x79\x6f"]}["\x67\x69f\x74"]);${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67c\x6dr\x75\x79j"]}="\x74\x6f\x74\x61\x6c\x6d\x6f\x6e\x65\x79";${${"\x47L\x4f\x42\x41L\x53"}["\x73\x79\x73w\x74\x72\x78\x65\x69\x70\x62"]}="\x6f\x69\x6e\x79k\x67\x6ecr\x6c\x66\x7a";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x72k\x67\x72c\x6a\x76\x79"]}="\x70\x6c\x61\x6e\x49\x6e\x66\x6fx";${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x6e\x6a\x6cq\x67\x6e\x66l"]}="\x67\x69\x66\x74";${"\x47\x4c\x4f\x42\x41L\x53"}["\x7a\x66\x6f\x73\x64\x69"]="\x75\x73\x65\x72\x6e\x61\x6d\x65\x53\x51L";${"G\x4c\x4f\x42\x41\x4cS"}["\x73\x6fh\x68\x63\x64\x72\x61"]="\x62\x61l\x61\x6ec\x65";${${${"\x47L\x4f\x42\x41\x4c\x53"}["nw\x67\x66\x79\x67"]}}=${${"\x47\x4c\x4f\x42A\x4c\x53"}["s\x6fh\x68\x63\x64\x72\x61"]}+${${${${"\x47\x4c\x4fB\x41L\x53"}["sy\x73w\x74\x72\x78e\x69p\x62"]}}};echo"\x3c\x73c\x72\x69\x70\x74\x3e";echo"\x73\x77\x61\x6c({\n\x20\x20\x74\x69\x74\x6c\x65:\x20\x22\x79\x6f\x75\x20\x68\x61v\x65\x20\x72\x65\x63e\x69v\x65d\x20\x6d\x6f\x6e\x65y\x20y\x6f\x75\x20a\x72\x65\x20\x74\x68\x65 l\x61\x73\x74 w\x69\x6e\x6e\x65\x72\x20\x2e\x22,\n\x20 \x77i\x64t\x68:\x20\x36\x30\x30,\n\x20\x20\x70a\x64\x64\x69\x6e\x67:\x20\x22\x33\x65\x6d\x22,\n\x20\x20\x62\x61\x63\x6b\x67\x72\x6f\x75n\x64:\x20\x22\x23f\x66\x66\x20\x75\x72\x6c(\x68\x74\x74\x70\x73://\x73\x77\x65\x65\x74\x61\x6c\x65\x72\x74\x32\x2e\x67\x69\x74\x68\x75\x62\x2e\x69\x6f/\x69\x6d\x61\x67\x65s/\x74\x72\x65\x65\x73\x2e\x70\x6e\x67)\x22,\n\x20\x20\x62\x61c\x6b\x64\x72\x6f\x70:\x20\x60\n\x20\x20\x20\x20\x72g\x62\x61(\x30,\x30,\x312\x33,\x30\x2e\x34)\n\x20\x20\x20\x20\x75\x72\x6c(\x22\x68\x74\x74\x70\x73://\x73\x77\x65\x65\x74\x61\x6c\x65\x72\x74\x32\x2e\x67\x69\x74\x68\x75b\x2e\x69\x6f/\x69\x6d\x61\x67\x65\x73/\x6ey\x61\x6e-\x63\x61\x74\x2e\x67\x69\x66\x22)\n\x20\x20\x20\x20\x63\x65\x6e\x74\x65\x72\x20\x6c\x65\x66t\n\x20 \x20\x20\x6eo-\x72\x65p\x65\x61\x74\n\x20\x20\x60\n})";echo"\x3c/\x73c\x72\x69\x70\x74\x3e";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x69\x62\x72\x6e\x79s\x6c\x64"]}=$odb->prepare("\x55\x50\x44\x41T\x45\x20\x60\x75\x73\x65r\x73\x60\x20\x53\x45\x54\x20\x60\x62\x61l\x61\x6e\x63e`\x20=\x20:a\x63\x63\x62\x20W\x48E\x52\x45\x20`\x75\x73\x65\x72n\x61m\x65\x60\x20\x3d\x20:\x75\x73\x65\x72\x6ea\x6d\x65");${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x64\x64\x71\x6b\x73o"]="\x6c\x70\x67\x75f\x70\x6f\x66\x61";$SQLUpdate->execute(array(":\x75se\x72\x6e\x61m\x65"=>$_SESSION["\x75\x73\x65\x72\x6e\x61\x6d\x65"],":\x61\x63\x63\x62"=>${${${"\x47\x4c\x4f\x42ALS"}["t\x6e\x66\x64\x75\x6f\x70\x74\x6a\x79"]}}));${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x62\x69\x77m\x73\x6a\x6d\x65\x7ar"]}=$odb->query("\x53\x45\x4c\x45\x43T\x20`\x6d\x65mb\x65\x72\x73\x68\x69\x70\x60\x20\x46\x52\x4f\x4d\x20\x60\x75\x73\x65\x72s\x60\x20\x57\x48E\x52\x45 \x60\x75\x73\x65\x72n\x61\x6d\x65\x60\x20\x3d\x20\x27{$_SESSION['username']}\x27");${${"\x47L\x4f\x42\x41\x4c\x53"}["\x74\x68\x6ci\x69\x64\x6b\x7a\x6c"]}=$userInfoDatax->fetch(PDO::FETCH_BOTH);${"\x47\x4c\x4f\x42\x41\x4c\x53"}["n\x6f\x74\x62\x7a\x6c\x72\x73\x6d\x6dn"]="\x70\x6c\x61\x6e\x49\x6e\x66\x6f\x78";${${"\x47\x4cO\x42\x41\x4c\x53"}["\x6dt\x79\x6c\x7a\x75\x71b\x64"]}=$odb->query("S\x45\x4c\x45\x43\x54\x20\x60\x76\x69\x70\x60 \x46\x52\x4f\x4d\x20\x60\x70\x6c\x61\x6e\x73\x60\x20WH\x45\x52\x45\x20\x60\x69\x64\x60\x20\x3d\x20\x27{$userInfox['membership']}\x27");${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6eo\x74\x62\x7a\x6c\x72\x73\x6d\x6d\x6e"]}=$planInfoDatax->fetch(PDO::FETCH_BOTH);${${"G\x4c\x4fB\x41\x4c\x53"}["\x63p\x79\x62\x6c\x64\x67v"]}="\x75\x73\x65\x72G\x69\x66\x74";if(${${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x62\x6d\x69\x71\x75\x6a\x68"]}}["v\x69p"]==1){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x65\x6c\x69\x63\x66\x79\x74\x6c\x61\x6a"]="\x75\x73\x65\x72n\x61\x6d\x65\x53\x51\x4c";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x65\x6ci\x63\x66\x79\x74\x6c\x61\x6a"]}="[\x3c\x62\x62\x20\x63\x6c\x61\x73s\x3d\x22\x74\x65\x78\x74-\x77\x61\x72\x6e\x69\x6e\x67\x22\x3e\x56\x49P\x3c/\x62\x62\x3e]\x20[\x3c\x62\x62\x20\x63\x6c\x61\x73\x73\x3d\x22\x74\x65\x78\x74-\x70\x72\x69\x6d\x61\x72\x79\x22\x3e\x57\x6f\x6e:\x20".${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67\x77\x73\x6c\x78\x72\x72\x6b\x73"]}."\$\x3c/\x62\x62\x3e]".$_SESSION["\x75s\x65\x72\x6e\x61\x6de"];}else{${${"\x47\x4c\x4f\x42A\x4c\x53"}["g\x68m\x77\x6e\x79"]}="\x67\x69\x66\x74";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x74\x7a\x65\x76\x76\x75\x6f"]}="[\x3cb\x62 \x63\x6c\x61\x73\x73\x3d\"t\x65x\x74-\x64\x61\x6e\x67\x65\x72\x22\x3e\x55\x73\x65\x72\x3c/b\x62\x3e]\x20[\x3c\x62\x62 \x63\x6c\x61\x73\x73\x3d\"\x74\x65\x78t-\x70\x72\x69\x6d\x61\x72\x79\x22\x3e\x57\x6f\x6e:\x20".${${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x67\x68m\x77\x6e\x79"]}}."\$\x3c/\x62\x62>]".$_SESSION["\x75s\x65\x72\x6ea\x6d\x65"];}${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x69\x62\x72\x6e\x79\x73\x6c\x64"]}=$odb->prepare("\x49\x4eS\x45\x52\x54\x20\x49\x4eT\x4f\x20\x60\x64\x61i\x6c\x79\x67\x69\x66\x74\x77\x6fn\x60(\x60\x49D\x60,\x20\x60\x75sern\x61\x6d\x65\x60,\x20\x60\x64\x61t\x65\x60) V\x41\x4c\x55\x45\x53\x20(\x4eU\x4c\x4c,:\x75s\x65\x72\x6e\x61\x6d\x65,:\x64\x61\x74\x65)");$SQLUpdate->execute(array(":\x75\x73e\x72\x6e\x61\x6d\x65"=>${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x7a\x66\x6f\x73\x64\x69"]},":d\x61te"=>${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x69\x6do\x6d\x68\x73\x67"]}));${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["gi\x6a\x6a\x6d\x65\x67e"]}=$odb->prepare("\x49\x4e\x53E\x52\x54\x20\x49N\x54\x4f\x20`\x67\x69\x66\x74\x6c\x6f\x67\x73\x60(\x60\x69\x64\x60,\x20\x60\x75\x73er\x60, \x60\x61\x6d\x6f\x75n\x74\x60,\x20\x60\x64\x61\x74\x65\x60)\x20\x56\x41\x4c\x55\x45\x53\x20(\x4e\x55\x4c\x4c,:\x75\x73e\x72,:\x61\x6d\x6f\x75\x6e\x74,:\x64\x61\x74\x65)");$SQL->execute(array(":\x75\x73\x65\x72"=>$_SESSION["\x75\x73\x65\x72\x6e\x61\x6d\x65"],":\x61\x6d\x6f\x75\x6e\x74"=>${${${"\x47\x4c\x4f\x42\x41L\x53"}["\x64d\x71k\x73\x6f"]}}["\x67\x69f\x74"],":\x64\x61\x74\x65"=>time()));}}
?>
  <nav id="sidebar">                <div id="sidebar-scroll">
                    <div class="slimScrollBar">
                        <div class="content-header content-header-fullrow px-15">
                            <div class="content-header-section sidebar-mini-visible-b">
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                            </div>
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <div class="content-header-item tossing">
                                    <a class="link-effect font-w700" href="index.php">
                                        <i class="si si-fire text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">Bootme</span><span class="font-size-xl text-primary">Club</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                <img class="img-avatar img-avatar32" src="avatar-user.png" alt="">
                            </div>
                            <div class="sidebar-mini-hidden-b text-center">
                                <a class="img-link" href="profile.php">
                                    <img class="img-avatar" src="avatar-user.png" alt="">
                                </a>
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase tossing" href="profile.php"><?php echo ucfirst($_SESSION['username']); ?></a>
                                    </li>
                                      <li class="list-inline-item">
									  <a href="javascript:void(0)" class="link-effect text-dual-primary-dark" onclick="ShowMyIp()">
                                            <i class="fa fa-diamond"> </i>
                                        </a>
										
                                        <a href="javascript:void(0)" class="link-effect text-dual-primary-dark" onclick="logOutByRiPx()">
                                            <i class="si si-logout"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
							       <li>
                                    <a <?php if ($page=='Dashboard' ) { echo 'class="active"'; } ?> href="index.php">
                                    <i class="fa fa-home"></i>Home</a>
								   </li>
								   
								   <li class="">
<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-shopping-cart"></i><span class="sidebar-mini-hide">Products & more</span></a>
<ul>
<li>
                                    <a <?php if ($page=='Purchase' ) { echo 'class="active"'; } ?> href="purchase.php">
                                    Purchase</a>
								   </li>
								   <li>
                                    <a <?php if ($page=='Addons' ) { echo 'class="active"'; } ?> href="addons.php">
                                    Addons</a>
								   </li>
								   <li>
                                    <a <?php if ($page=='Payments' ) { echo 'class="active"'; } ?> href="payments.php">
                                    Payments</a>
								   </li>
								   <li>
                                    <a <?php if ($page=='Add Balance' ) { echo 'class="active"'; } ?> href="paypalrip.php">
                                    Add Balance</a>
								   </li>
</li>
</ul>
</li>
		
								  <li class="nav-main-heading"><span class="sidebar-mini-visible">HUB</span><span class="sidebar-mini-hidden">STRESS</span> <span class="badge badge-danger"><i class="fa fa-fire mr-5"></i>OP</span></li>
								   <li>
                                    <a <?php if ($page=='FreeHub' ) { echo 'class="active"'; } ?> href="freehub.php">
                                    <i class="si si-energy pull-right"></i>FreeHub</a>
								   </li>
								   <?php if ($user -> hasMembership($odb)) { //check if user has plan, save to main page. ?>
								   <li>
                                    <a <?php if ($page=='Hub' ) { echo 'class="active"'; } ?> href="hub.php">
                                    <i class="si si-energy pull-right"></i>hub</a>
								   </li>
								   <?php
								   if (hasBNAccess($odb) == 1 || $user->isAdmin($odb)){
								   ?>
								   <li>
                                    <a <?php if ($page=='Botnet' ) { echo 'class="active"'; } ?> href="botnet.php">
                                    <i class="si si-energy pull-right"></i>botnet</a>
								   </li>
								   <?php } ?>
								   <?php } ?>
								   <li class="nav-main-heading"><span class="sidebar-mini-hidden">Pages</span></li>  
								   <li>
                                    <a <?php if ($page=='Tos' ) { echo 'class="active"'; } ?> href="tos.php">
                                    <i class="si si-question pull-right"></i>Tos</a>
								   </li>  <li>
								   <li class="">
<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-free-code-camp"></i><span class="sidebar-mini-hide">DSTATS</span></a>
<ul>
<li>
								   <li>
                                    <a <?php if ($page=='DSTAT' ) { echo 'class="active"'; } ?> href="dstat.php">
                                    Layer7</a>
								   </li>
</li>
</ul>
</li>
                                    <a <?php if ($page=='Tos' ) { echo 'class="active"'; } ?> href="https://discord.gg/3gkXfSb">
                                    <i class="si si-question pull-right text-warning"></i>Discord</a>
								   </li>
								   <li>
                                   <a <?php if ($page=='TransferMoney' ) { echo 'class="active"'; } ?> href="transfermoney.php">
                                   <i class="fa fa-exchange pull-left"></i> Transfer Money <span class="badge badge-primary">New!</span>
                                   </a>
                                   </li>
								   <li>
                                   <a <?php if ($page=='Api Acces' ) { echo 'class="active"'; } ?> href="api.php">
                                   <i class="fa fa-circle-o pull-left"></i> Api Acces <span class="badge badge-primary">New!</span>
                                   </a>
                                   </li>
								   <li>
                                    <a <?php if ($page=='support' ) { echo 'class="active"'; } ?> href="support.php">
                                    <i class="fa fa-envelope-open-o"></i>Support</a>
								   </li>
								   <li>
                                    <a <?php if ($page=='Team' ) { echo 'class="active"'; } ?> href="team.php">
                                    <i class="fa fa-id-badge"></i>Team</a>
								   </li>
								    <li class="nav-main-heading"><span class="sidebar-mini-visible"></span><span class="sidebar-mini-hidden">Admin / Support Team</span></li>
									 <?php
				                     if ($user -> isAdmin($odb)){ 
	                                 ?>
                											   <li>
                                    <a <?php if ($page=='admin' ) { echo 'class="active"'; } ?> href="adminripx/">
                                    <i class="fa fa-users"></i>AdminPanel <span class="badge badge-info"><i class="fa fa-fire mr-5"></i>ADMIN</span></a>
								    </li><?php  }?>
									
									
									
										 <?php
				                     if ($user -> isSupport($odb)){ 
	                                 ?>
                											   <li>
                                    <a <?php if ($page=='admin' ) { echo 'class="active"'; } ?> href="supportripx/">
                                    <i class="fa fa-users"></i>SupportPanel <span class="badge badge-info"><i class="fa fa-fire mr-5"></i>SUPPORT</span></a>
								    </li><?php  }?>
									
									
									
	                                
									<?php 				
									$Adminnn = $odb->query("SELECT * FROM `users` WHERE `rank` = '69'");

									while($rowAdmins = $Adminnn->fetch(PDO::FETCH_BOTH)){
										$timeoffline = time() - $rowAdmins['activity'];
                                        $conline = $odb->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username  AND {$timeoffline} < 60");
										$conline->execute(array(':username' => $rowAdmins['username']));
										$onlineripx = $conline->fetchColumn(0);

						                if($rowAdmins['username'] == "Daren1x"){
											 $emojis = "💎";
										}elseif($rowAdmins['username'] == "OWNER"){
										     $emojis = "😼";	
										}elseif($rowAdmins['username'] == "iLxSioNz"){
										 $emojis = "👻";
										}else{
											 $emojis = "💎";
										}
										$logo = "fa fa-ban";
										if($onlineripx == "1"){  
                                        echo '<li><a href="#"><i class="fa fa-circle-o text-success"></i><span class="sidebar-mini-hide"> [<bb class="text-success">Admin</bb>] '. $rowAdmins['username'] .''.$emojis.'</span></a></li>';
                                        } 
										else {
										 echo '<li><a href="#"><i class="fa fa-circle-o text-danger"></i><span class="sidebar-mini-hide"> [<bb class="text-danger">Admin</bb>] '. $rowAdmins['username'].''.$emojis.'</span></a></li>';
                                        }
									}
									
									$Supportt = $odb->query("SELECT * FROM `users` WHERE `rank` = '15'");

									while($rowSupports = $Supportt->fetch(PDO::FETCH_BOTH)){
										$timeofflinex = time() - $rowSupports['activity'];
                                        $conlinex = $odb->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username  AND {$timeofflinex} < 60");
										$conlinex->execute(array(':username' => $rowSupports['username']));
										$onlinesupportripx = $conlinex->fetchColumn(0);

										if($rowSupports['username'] == "dremonte"){
											 $emojis = "💎";
										}elseif($rowSupports['username'] == "chili10"){
										 $emojis = "👻";
										}else{
											 $emojis = "💎";
										}
										
										$logo = "fa fa-ban";
										if($onlinesupportripx == "1"){  
                                        echo '<li><a href="#"><i class="fa fa-circle-o text-success"></i><span class="sidebar-mini-hide"> [<bb class="text-success">Mod</bb>] '. $rowSupports['username'] .''.$emojis.'</span></a></li>';
                                        } 
										else {
										 echo '<li><a href="#"><i class="fa fa-circle-o text-danger"></i><span class="sidebar-mini-hide"> [<bb class="text-danger">Mod</bb>] '. $rowSupports['username'] .''.$emojis.'</span></a></li>';
                                        }
									}
								?>							
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
			
            <header id="page-header">        
                <div class="content-header">
                    <div class="content-header-section">
             
                        <button type="button" class="btn btn-primary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
           		     <?php
				     $SQL = $odb -> prepare("SELECT `username` FROM `dailygiftwon` ORDER BY `ID` DESC LIMIT 1");
			         $SQL -> execute();
			         $LastWinner = $SQL -> fetchColumn(0);
					 ?>
					
                    <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Balance"> <b>$<?php echo number_format((float)$balance, 2, '.', ''); ?> </b></button>
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Last Winner"> <b>Last Winner: <?php echo $LastWinner; ?></b></button>
                    </div>
           <div class="content-header-section" role="group">



						
</div>
                </div>
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
								
                                <input type="text" class="form-control" placeholder="" id="page-header-search-input" name="page-header-search-input">
								
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
      
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
    
            </header>
<script>
				    window.setInterval(function(){
					var xmlhttp;
					if (window.XMLHttpRequest){
				    xmlhttp = new XMLHttpRequest();
					}
					else{
				    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.open("GET","ripx/check.php?username=<?php echo $_SESSION['username']; ?>",true);
					xmlhttp.send(); 
					}, 8000);
</script>
<script>
                function logOutByRiPx() {
                    swal({
                        buttonsStyling: !1,
                        confirmButtonClass: "btn btn-lg btn-alt-success m-5",
                        cancelButtonClass: "btn btn-lg btn-alt-danger m-5",
                        inputClass: "form-control",
                        title: "Are you sure?",
                        text: "Are you sure you want to end the session?",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#d26a5c",
                        confirmButtonText: "Yes, Logout!",
                        html: !1,
                        preConfirm: function() {
                            return new Promise(function(n) {
                                setTimeout(function() {
                                    n()
                                }, 50)
                            })
                        }
                    }).then(function(n) {
                        setTimeout(function() {
                            window.location.replace('logout.php');
                        }, 3000)
                        swal("Bye Bye!", "Youv'e just being redirected to the login page...", "success")
                    }, function(n) {})

                }
				
function ShowMyIp() {
const ipAPI = 'https://api.ipify.org?format=json'
swal.queue([{
  title: "Your public IP",
  confirmButtonText: "Show my public IP",
  showLoaderOnConfirm: true,
  preConfirm: () => {
    return fetch(ipAPI)
      .then(response => response.json())
      .then(data => swal.insertQueueStep(data.ip))
      .catch(() => {
        swal.insertQueueStep({
          type: 'error',
          title: 'Unable to get your public IP'
        })
      })
  }
}])

				}
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5930c3fc4374a471e7c5106f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->