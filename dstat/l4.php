
<!--
 _____           _       _ _   
|  ___|         | |     (_) |  
| |____  ___ __ | | ___  _| |_ 
|  __\ \/ / '_ \| |/ _ \| | __|
| |___>  <| |_) | | (_) | | |_ 
\____/_/\_\ .__/|_|\___/|_|\__|
          | |                  
          |_|                  
-->

<title></title>
<center>
<html>
    <head>
<script src="js/jquery.min.js"></script>

<script src="js/highcharts-en.js"></script>
<script src="js/exporting-en.js"></script>

<style>
body {
      background-color:black;
      }
</style>
        		
        <script id="source" language="javascript" type="text/javascript">
$(document).ready(function() {
	
	Highcharts.createElement('link', {
   href: 'https://fonts.googleapis.com/css?family=Unica+One',
   rel: 'stylesheet',
   type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);
    
    chart2 = new Highcharts.Chart({
        chart: {
            renderTo: 'container2',
            defaultSeriesType: 'spline',
            events: {
                load: requestData2
            }
        },
        title: {
            text: 'Layer 4 > IPADDRESS:PORT'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150,
            maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'Bit per second (20 M is 20MBPS)',
                margin: 80
            }
        },
        series: [{
            name: 'Bit/s',
            data: []
        }]
    });        
});
 
function requestData2() {
    $.ajax({
        url: 'data/layer4.php',
        success: function(point) {
            var series = chart2.series[0],
                shift = series.data.length > 20;
            chart2.series[0].addPoint(point, true, shift);
            setTimeout(requestData2, 1000);    
        },
        cache: false
    });
}
    </script>
		
		
    </head>
    <body>
    <div id="container"></div><br>
	<div id="container2"></div><br>
</html>
