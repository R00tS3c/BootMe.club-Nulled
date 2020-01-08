<?php 
       require "inferno/anti-ddos-lite.php";
         ob_start();
	     require_once 'rip/configuration.php';
	     require_once 'rip/init.php';
		 
         if ($user -> LoggedIn()){
		 header('Location: index.php');
		 exit;
	     }
?>
<html lang="en" class="no-focus"><!--<![endif]-->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Bootme | Login</title>
        <meta name="description" content="BootMeClub is the most reliable stresser on the market. We only use the most dedicated and up-to-date hardware available, and put our focus
          on security and customer safety first. Specializing in powerful layer-4 and layer-7 attacks DDoS-Services is the only stresser you'll ever need.">
        <meta name="author" content="BootMeClub GmbH">
        <meta name="robots" content="noindex, nofollow">
        <meta property="og:title" content="BootMeClub | Login">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="BootMeClub is the most reliable stresser on the market. We only use the most dedicated and up-to-date hardware available, and put our focus
          on security and customer safety first. Specializing in powerful layer-4 and layer-7 attacks DDoS-Services is the only stresser you'll ever need.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="assets/css/dark.css">
	    <link rel="stylesheet" id="css-main" href="assets/css/animations.css">
	    <link href="assets/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
		 <link href="assets/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <script async="" src="//www.google-analytics.com/analytics.js"></script><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-16158021-6', 'auto');ga('send', 'pageview');</script>
</head>
<body><div id="page-container" class="main-content-boxed">
<main id="main-container"><div style="background-image: url('bg.jpg'); background-size: 100% 100%; background-repeat: no-repeat;">
<div class="hero-static content content-full invisible" style="background-color: rgba(29, 29, 29, 0.86)!important;" data-toggle="appear">
<div class="py-30 px-5 text-center tossing">
<a class="link-effect font-w700" href="index.php">
                <i class="si si-fire fa-2x"></i>
                <span class="font-size-xl text-white">Bootme</span><span class="font-size-xl">Club</span>
            </a>
<h2 class="h4 font-w400 text-muted mb-0">Please sign in</h2>
</div>
<div class="row justify-content-center px-5">
<div class="col-sm-8 col-md-6 col-lg-4">
<div id="alert" style="display:none"></div>
	 <?php
       
         if (isset($_GET['session'])){
if($_GET['session'] == "rip"){

    echo '<div class="alert alert-warning tossing"> Your session has timed out.
	</center></div>';

                }
            }

            ?>
<div class="form-group row">
<div class="col-12">
<div class="form-material floating">
<input type="text" id="username" class="form-control" onkeydown="if (event.keyCode == 13) document.getElementById('login').click()">
<label for="login-username">Username</label>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-12">
<div class="form-material floating">
<input type="password" id="password" class="form-control"  onkeydown="if (event.keyCode == 13) document.getElementById('login').click()">
<label for="login-password">Password</label>
</div>
</div>
</div>
<div class="form-group row gutters-tiny">
<div class="col-12 mb-10">
<div id="hidebtn" >
<button class="btn btn-block btn-hero btn-noborder btn-rounded btn-primary" id="login" onclick="login()">
<i class="si si-login mr-10"></i> Login
</button>
</div>
</div>
<div class="col-12 mb-10">
<div id="loader" style="display:none">
<button class="btn btn-block btn-hero btn-noborder btn-rounded btn-danger" id="login" onclick="login()">
<i class="si si-login mr-10"></i> Loading...
</button>
</div>
</div>
<div class="col-sm-6 mb-5">
<a class="btn btn-block btn-noborder btn-rounded btn-warning" href="register.php">
<i class="fa fa-plus text-muted mr-5"></i> Register
</a>
</div>
<div class="col-sm-6 mb-5">
<a class="btn btn-block btn-noborder btn-rounded btn-warning" href="reminder">
<i class="fa fa-warning text-muted mr-5"></i> Forgot password
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<script>
$("#password").keyup(function(event){
    if(event.keyCode == 13){
        login();
    }
});

function login()
{
var user=$('#username').val();
var password=$('#password').val();
document.getElementById("alert").style.display="none";
document.getElementById("loader").style.display="inline";
document.getElementById("hidebtn").style.display="none";
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
    document.getElementById("alert").innerHTML=xmlhttp.responseText;
	document.getElementById("loader").style.display="none";
	document.getElementById("alert").style.display="inline";
  document.getElementById("hidebtn").style.display="inline";
	if (xmlhttp.responseText.search("Redirecting") != -1)
	{
	setInterval(function(){window.location="index.php"},3000);
    }
    }
  }
xmlhttp.open("POST","ripx/login.php?type=login",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("user=" + user + "&password=" + password);
}
</script>
<script src="assets/js/codebase.min.js"></script>
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/pages/login.js"></script>
   <script src="assets/toastr/toastr.min.js"></script>
		 <script type="text/javascript">
            $(function () {
                var i = -1;
                var toastCount = 0;
                var $toastlast;

                var getMessage = function () {
                    var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
                        'Are you the six fingered man?',
                        'Inconceivable!',
                        'I do not think that means what you think it means.',
                        'Have fun storming the castle!'
                    ];
                    i++;
                    if (i === msgs.length) {
                        i = 0;
                    }

                    return msgs[i];
                };

                var getMessageWithClearButton = function (msg) {
                    msg = msg ? msg : 'Clear itself?';
                    msg += '<br /><br /><button type="button" class="btn btn-default clear">Yes</button>';
                    return msg;
                };

                $('#showtoast').click(function () {
                    var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
                    var msg = $('#message1').val();
                    var title = $('#title').val() || '';
                    var $showDuration = $('#showDuration');
                    var $hideDuration = $('#hideDuration');
                    var $timeOut = $('#timeOut');
                    var $extendedTimeOut = $('#extendedTimeOut');
                    var $showEasing = $('#showEasing');
                    var $hideEasing = $('#hideEasing');
                    var $showMethod = $('#showMethod');
                    var $hideMethod = $('#hideMethod');
                    var toastIndex = toastCount++;
                    var addClear = $('#addClear').prop('checked');

                    toastr.options = {
                        closeButton: $('#closeButton').prop('checked'),
                        debug: $('#debugInfo').prop('checked'),
                        newestOnTop: $('#newestOnTop').prop('checked'),
                        progressBar: $('#progressBar').prop('checked'),
                        positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                        preventDuplicates: $('#preventDuplicates').prop('checked'),
                        onclick: null
                    };

                    if ($('#addBehaviorOnToastClick').prop('checked')) {
                        toastr.options.onclick = function () {
                            alert('You can perform some custom action after a toast goes away');
                        };
                    }

                    if ($showDuration.val().length) {
                        toastr.options.showDuration = $showDuration.val();
                    }

                    if ($hideDuration.val().length) {
                        toastr.options.hideDuration = $hideDuration.val();
                    }

                    if ($timeOut.val().length) {
                        toastr.options.timeOut = addClear ? 0 : $timeOut.val();
                    }

                    if ($extendedTimeOut.val().length) {
                        toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut.val();
                    }

                    if ($showEasing.val().length) {
                        toastr.options.showEasing = $showEasing.val();
                    }

                    if ($hideEasing.val().length) {
                        toastr.options.hideEasing = $hideEasing.val();
                    }

                    if ($showMethod.val().length) {
                        toastr.options.showMethod = $showMethod.val();
                    }

                    if ($hideMethod.val().length) {
                        toastr.options.hideMethod = $hideMethod.val();
                    }

                    if (addClear) {
                        msg = getMessageWithClearButton(msg);
                        toastr.options.tapToDismiss = false;
                    }
                    if (!msg) {
                        msg = getMessage();
                    }

                    $('#toastrOptions').text('Command: toastr["'
                            + shortCutFunction
                            + '"]("'
                            + msg
                            + (title ? '", "' + title : '')
                            + '")\n\ntoastr.options = '
                            + JSON.stringify(toastr.options, null, 2)
                    );

                    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                    $toastlast = $toast;

                    if (typeof $toast === 'undefined') {
                        return;
                    }

                    if ($toast.find('#okBtn').length) {
                        $toast.delegate('#okBtn', 'click', function () {
                            alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                            $toast.remove();
                        });
                    }
                    if ($toast.find('#surpriseBtn').length) {
                        $toast.delegate('#surpriseBtn', 'click', function () {
                            alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                        });
                    }
                    if ($toast.find('.clear').length) {
                        $toast.delegate('.clear', 'click', function () {
                            toastr.clear($toast, {force: true});
                        });
                    }
                });

                function getLastToast() {
                    return $toastlast;
                }

                $('#clearlasttoast').click(function () {
                    toastr.clear(getLastToast());
                });
                $('#cleartoasts').click(function () {
                    toastr.clear();
                });
            })
        </script>
</body></html>