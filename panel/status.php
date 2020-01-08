<?php 

   // RiPx is the best ;)
   // if you leak this source you are dead nigga
session_start();
$page = "Status";
include 'header.php';

	    if (!($user->isVerified($odb)))
        {
        header('location: verifyuser.php');
        die();
        }
		?>
<button type="button" id="popout" class="btn btn-alt-warning" data-toggle="modal" data-target="#modal-popout"></button>
    <main id="main-container" style="min-height: 536px;">
	  <div class="bg-image" style="background-image: url('assets/landing-promo-developer-minded-html@2x.png');">
    <div class="bg-black-op">
        <div class="content content-top text-center">
            <div class="py-50">
                <h1 class="font-w700 text-white mb-10">💀 RiP-Stresser Status 💀 </h1>
                <h2 class="h4 font-w400 text-white-op">Servers and Methods!</h2>
            </div>
        </div>
    </div>
</div>
  <div class="content">
<div class="row">
	<div class="col-lg-12">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
                <h3 class="block-title"><i class="fa fa-server"></i>  Last Servers</h3>
            </div>
<div class="block-content block-content-dark">
	<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 3=2(0(){$(\'#1\').5(\'6.b?a=9\').7("8")},c);',13,13,'function|live_servers|setInterval|auto_refresh|var|load|ripserv|fadeIn|slow|15|count|php|2000'.split('|'),0,{}))
</script>

					<div id="live_servers"></div>


</div>
</div>
</div>
	<div class="col-lg-12">
<div class="block block-themed animated zoomIn" style="box-shadow: 0 -5px 25px -5px #fbfbfc, 0 1px 5px 0 #fbfbfc, 0 0 0 0 #fbfbfc;">
<div class="block-header bg-corporate-dark">
                <h3 class="block-title"><i class="fa fa-bolt"></i>  Best 8 Methods </h3>
            </div>
<div class="block-content block-content-dark">

	<table class="table table-striped">
	<thead>
        <tr>
			<th class="text-center" style="font-size: 12px;">Method</th>
			<th class="text-center" style="font-size: 12px;">Attacks</th>
			   <th class="text-center" style="font-size: 12px;">Porcentaje</th>
			<th class="text-center" style="font-size: 12px;">Network</th>
        </tr>
	</thead>
    <tbody>
	
       <?php
	   
        $SQLGetMethods = $odb -> query("SELECT * FROM `logs`");
        $metodos_limit = 0;
        while($getInfo = $SQLGetMethods -> fetch(PDO::FETCH_ASSOC)){
         if (!(isset($Metodos[$getInfo['method']]))) {
          $Metodos[$getInfo['method']] = 0;
         }
         $Metodos[$getInfo['method']] = $Metodos[$getInfo['method']] + 1;
        }
        asort($Metodos);
        $Metodos = array_reverse($Metodos);
        $Metodos = array_slice($Metodos, 0, 8, true);

        $Total = 0;


        foreach ($Metodos as $key => $value) {
         $Total = $Total + $value;
        }

        function get_percentage($total, $number)
        {
          if ( $total > 0 ) {
           return round($number / ($total / 100),2);
          } else {
            return 0;
          }
        }



        foreach ($Metodos as $key => $value) {
         $Porcentaje = get_percentage($Total, $value);
		 
		 	if ($Porcentaje >= 0 and $Porcentaje <= 10 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-success" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width:'. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}elseif ($Porcentaje >= 11 and $Porcentaje <= 25 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-info" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}elseif ($Porcentaje >= 25 and $Porcentaje <= 30 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-warning" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}elseif ($Porcentaje >= 40 and $Porcentaje <= 100 )
			{
  $ripx = '<div class="progress progress-lg m-b-5" style="margin-bottom:0px;"><div class="progress-bar bg-danger" role="progressbar" aria-valuenow="'. $Porcentaje .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $Porcentaje .'%; visibility: visible; animation-name: animationProgress;"><center>' . $Porcentaje . '%</center></div></div>';
			}
			
         echo '<tr class="text-center" style="font-size: 12px;">
		<td><b class="text-info">'.htmlspecialchars($key).'</b></td>
		<td><b class="text-info"><span class="badge" style="background: linear-gradient(135deg, #262f38 0, #42a5f5 100%)!important;">'.$value.'</span></b></td>	
		<td><center><b class="text-danger">'.$ripx.'</b></center></td>	
		<td><span class="badge badge-info"><i class="fa fa-bolt"></i></span> <b class="text-info">ViP Network</b></td>	
			</tr>';
                  


         echo '</tr>';
        }
       ?>
    </tbody>
 </table>	
                          
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

</div>
 <!-- END Page Container -->
<?php include('footer.php'); ?>
      <script type="text/javascript">
 !function($) {
	"use strict";

	var VectorMap = function() {
	};

	VectorMap.prototype.init = function() {
		//various examples
				  $('#world-mapx').vectorMap(
{
    map: 'world_mill_en',
    backgroundColor: 'transparent',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: '#353C48',
    regionStyle : {
        initial : {
          fill : '#1583ea'
        }
      },
    markerStyle: {
      initial: {
                    r: 9,
                    'fill': '#fff',
                    'fill-opacity':1,
                    'stroke': '#000',
                    'stroke-width' : 5,
                    'stroke-opacity': 0.4
                },
                },
    enableZoom: true,
    hoverColor: '#009efb',
    markers : [
 <?php
            $SQLSelect = $odb->query("SELECT `ip` FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 ORDER BY `id` DESC");
            while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {
                $ipAttack = $show['ip'];


                if (!filter_var($ipAttack, FILTER_VALIDATE_IP) === false) {

                $geolocation = ip2geolocation($ipAttack);
                $geolocation->latitude;
                $geolocation->longitude;
                $geolocation->longitude;
                $ipOctets = explode('.', $ipAttack);
                $ipnew = $ipOctets[0] . '.' . $ipOctets[1] . '.' . preg_replace('/./', '*', $ipOctets[2]) . '.' . preg_replace('/./', '*', $ipOctets[3]);

                }
                else
                {
                    // remove http://
                    $url = preg_replace('#^https?://#', '', $ipAttack);
                    $url = preg_replace('#^http?://#', '', $ipAttack);

                    $ipnew = gethostbyname($url);
                    $geolocation = ip2geolocation($ipnew);
                    $geolocation->latitude;
                    $geolocation->longitude;
                    $geolocation->longitude;

                    $ipOctets = explode('.', $ipnew);
                    $ipnew = $ipOctets[0] . '.' . $ipOctets[1] . '.' . preg_replace('/./', '*', $ipOctets[2]) . '.' . preg_replace('/./', '*', $ipOctets[3]);

                }




                echo  "{latLng: [".$geolocation->latitude.", ".$geolocation->longitude."], name: '".$ipnew."'},\n";
            }

          ?>

            {latLng: [, ], name: ''}
            ]
		});


		$('#uk').vectorMap({
			map : 'uk_mill_en',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});

		$('#usa').vectorMap({
			map : 'us_aea_en',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});


		$('#australia').vectorMap({
			map : 'au_mill',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});
		
		
		$('#canada').vectorMap({
			map : 'ca_lcc',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			}
		});
		

	},
	//init
	$.VectorMap = new VectorMap, $.VectorMap.Constructor =
	VectorMap
}(window.jQuery),

//initializing
function($) {
	"use strict";
	$.VectorMap.init()
}(window.jQuery);
</script> 
<script src="grafici/jquery.min.js" type="text/javascript"></script>
<script src="grafici/jquery.flot.js" type="text/javascript"></script>
<script type="text/javascript">
        var plot = $.plot("#chart-dynamic", [[1,2,3,4,5] ], {
            series: {
                label: "Server Process Data",
                lines: {
                    show: true,
                    lineWidth: 0.2,
                    fill: 0.8
                },
    
                color: '#edeff0',
                shadowSize: 0
            },
            yaxis: {
                min: 0,
                max: 100,
                tickColor: '#31424b',
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#98a7ac"
                },
                shadowSize: 0
    
            },
            xaxis: {
                tickColor: '#31424b',
                show: true,
                font :{
                    lineHeight: 13,
                    style: "normal",
                    color: "#98a7ac"
                },
                shadowSize: 0,
                min: 0,
                max: 250
            },
            grid: {
                borderWidth: 1,
                borderColor: '#31424b',
                labelMargin:10,
                mouseActiveRadius:6
            },
            legend:{
                show: false
            }
        });


var xVal = 0;
var data = [[]];
function getData(yVal1){
	
	
    var datum1 = [xVal, yVal1];
    data[0].push(datum1);
    if(data[0].length>300){
        data[0] = data[0].splice(1);
    }
    xVal++;
    plot.setData(data);
    plot.setupGrid();
    plot.draw();
}

setInterval(function(){
$.get( "ripx/load.php", function( data ) {
  getData(parseInt(data));
});
}, 1000);
</script>
