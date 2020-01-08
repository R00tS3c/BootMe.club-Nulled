<?php 	


date_default_timezone_set('America/New_York');

ob_start();
require_once 'rip/configuration.php';
require_once 'rip/init.php';
	
?>	
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>

		
</head>
<body class="fixed-left">
<div class="card-box">
<div id="realnetwork" style="height: 382px; padding: 0px; position: relative;" class="flot-chart"></div>
</div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="assets/pages/jquery.flot.init.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

<script type="text/javascript">
		var sleeptime = 5000;
		$( document ).ready(function() {
        var data1 = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,];
        var totalPoints = 50;
        function GetData() {
        data1.shift();
        while (data1.length < totalPoints) {
		var req = new XMLHttpRequest();
		req.open('GET', 'ripx/network_load.php', false);
		req.send(null);

		if(req.status == 200) {
		data1.push(req.responseText);
		}
        }
		var result = [];
		for (var i = 0; i < data1.length; ++i) {
        result.push([i, data1[i]])
        }
		return result;
		}
		var updateInterval = 1000;
		var plot = $.plot($("#realnetwork"), [
            GetData()], {
            series: {
                lines: {
                    show: true,
                    fill: true,
					lineWidth: 2,
                },
                shadowSize: 1
            },
            yaxis: {
                min: 0,
                max: 100,
                ticks: 10,
            },
            xaxis: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: false,
				tickColor: "rgba(238, 238, 238, 0.1)",
                borderWidth: 3,
                borderColor: "rgba(238, 238, 238, 0.1)",
            },
            colors: ["#3bafda"],
            tooltip: true,
            tooltipOpts: {
                defaultTheme: false,
				content : "Network load <b>%y%</b>",
            }
        });
        function update() {
            plot.setData([GetData()]);
            plot.draw();
            setTimeout(update, updateInterval);
        }
        update();
    });
	
	
	</script>

</body></html>