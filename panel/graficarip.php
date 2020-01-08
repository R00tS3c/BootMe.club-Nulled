<?php 	
    if (($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
	exit("NOT ALLOWED");
	}
    if (!isset($_SERVER['HTTP_REFERER'])){
        die;
    }
    date_default_timezone_set('America/New_York');
    ob_start();
    require_once 'rip/configuration.php';
    require_once 'rip/functions.php';
?>	
<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="grafica/chartist.min.css">
<link href="grafica/pages.css" rel="stylesheet" type="text/css">

<script src="grafica/modernizr.min.js"></script>
</head>
<body class="fixed-left">
<div class="card-box">
<p class="text-muted m-b-30 font-13">
<font color="#42bff4"> &#x2605;</font><font color="white"> Started Attacks</font><br>
<font color="#f4416a"> &#9733; </font><font color="white"> Stopped Attacks</font><br>
</p>
<div id="smil-animations" class="ct-chart ct-golden-section"><div class="chartist-tooltip" style="top: 129px; left: 238px;"><span class="chartist-tooltip-value">300</span></div></div>
</div>

<script src="grafica/jquery.min.js"></script>
<script src="grafica/bootstrap.min.js"></script>
<script src="grafica/chartist.min.js"></script>
<script src="grafica/chartist-plugin-tooltip.min.js"></script>

				<?php
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

        $monthdaysago = time() - 2628000;
		$monthdaysago_after = $monthdaysago + 86400;
		
		$today = time();
		
		
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
		
		//LOGINS XDD
		
		
		
		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` > :date");
		$SQL -> execute(array(":date" => $onedayago));
		$login_one = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $twodaysago, ":after" => $twodaysago_after));
		$login_two = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $threedaysago, ":after" => $threedaysago_after));
		$login_three = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $fourdaysago, ":after" => $fourdaysago_after));
		$login_four = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $fivedaysago, ":after" => $fivedaysago_after));
		$login_five = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $sixdaysago, ":after" => $sixdaysago_after));
		$login_six = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `login_history` WHERE `date` BETWEEN :before AND :after");
		$SQL -> execute(array(":before" => $sevendaysago, ":after" => $sevendaysago_after));
		$login_seven = $SQL->fetchColumn(0);		
			
			
			
			
			
		//STOPED Attacks

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` > :date AND `stopped` = 1");
		$SQL -> execute(array(":date" => $onedayago));
		$stop_one = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after AND `stopped` = 1");
		$SQL -> execute(array(":before" => $twodaysago, ":after" => $twodaysago_after));
		$stop_two = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after AND `stopped` = 1");
		$SQL -> execute(array(":before" => $threedaysago, ":after" => $threedaysago_after));
		$stop_three = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after AND `stopped` = 1");
		$SQL -> execute(array(":before" => $fourdaysago, ":after" => $fourdaysago_after));
	    $stop_four = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after AND `stopped` = 1");
		$SQL -> execute(array(":before" => $fivedaysago, ":after" => $fivedaysago_after));
		$stop_five = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after AND `stopped` = 1");
		$SQL -> execute(array(":before" => $sixdaysago, ":after" => $sixdaysago_after));
		$stop_six = $SQL->fetchColumn(0);

		$SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` BETWEEN :before AND :after AND `stopped` = 1");
		$SQL -> execute(array(":before" => $sevendaysago, ":after" => $sevendaysago_after));
		$stop_seven = $SQL->fetchColumn(0);
		
		$date_one = date('d/m/Y', time());
		$date_two = date('d/m/Y', $onedayago);
		$date_three = date('d/m/Y', $twodaysago);
		$date_four = date('d/m/Y', $threedaysago);
		$date_five = date('d/m/Y', $fourdaysago);
		$date_six = date('d/m/Y', $fivedaysago);
		$date_seven = date('d/m/Y', $sixdaysago);

		?>
<script type="text/javascript">
var chart = new Chartist.Line('#smil-animations', {
labels: ["<?php echo $date_seven; ?>", "<?php echo $date_six; ?>", "<?php echo $date_five; ?>", "<?php echo $date_four; ?>", "<?php echo $date_three; ?>", "<?php echo $date_two; ?>", "<?php echo $date_one; ?>"],
series: [
[<?php echo $count_seven; ?>, <?php echo $count_six; ?>, <?php echo $count_five; ?>, <?php echo $count_four; ?>, <?php echo $count_three; ?>, <?php echo $count_two; ?>, <?php echo $count_one; ?>],
[<?php echo $stop_seven; ?>, <?php echo $stop_six; ?>, <?php echo $stop_five; ?>, <?php echo $stop_four; ?>, <?php echo $stop_three; ?>, <?php echo $stop_two; ?>, <?php echo $stop_one; ?>]
]
}, {
low: 0,
plugins: [
Chartist.plugins.tooltip()
]
});

// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
delays = 40,
durations = 350;

// Once the chart is fully created we reset the sequence
chart.on('created', function() {
seq = 0;
});

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
chart.on('draw', function(data) {
seq++;

if(data.type === 'line') {
// If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
data.element.animate({
opacity: {
// The delay when we like to start the animation
begin: seq * delays + 1000,
// Duration of the animation
dur: durations,
// The value where the animation should start
from: 0,
// The value where it should end
to: 1
}
});
} else if(data.type === 'label' && data.axis === 'x') {
data.element.animate({
y: {
begin: seq * delays,
dur: durations,
from: data.y + 100,
to: data.y,
// We can specify an easing function from Chartist.Svg.Easing
easing: 'easeOutQuart'
}
});
} else if(data.type === 'label' && data.axis === 'y') {
data.element.animate({
x: {
begin: seq * delays,
dur: durations,
from: data.x - 100,
to: data.x,
easing: 'easeOutQuart'
}
});
} else if(data.type === 'point') {
data.element.animate({
x1: {
begin: seq * delays,
dur: durations,
from: data.x - 10,
to: data.x,
easing: 'easeOutQuart'
},
x2: {
begin: seq * delays,
dur: durations,
from: data.x - 10,
to: data.x,
easing: 'easeOutQuart'
},
opacity: {
begin: seq * delays,
dur: durations,
from: 0,
to: 1,
easing: 'easeOutQuart'
}
});
} else if(data.type === 'grid') {
// Using data.axis we get x or y which we can use to construct our animation definition objects
var pos1Animation = {
begin: seq * delays,
dur: durations,
from: data[data.axis.units.pos + '1'] - 30,
to: data[data.axis.units.pos + '1'],
easing: 'easeOutQuart'
};

var pos2Animation = {
begin: seq * delays,
dur: durations,
from: data[data.axis.units.pos + '2'] - 100,
to: data[data.axis.units.pos + '2'],
easing: 'easeOutQuart'
};

var animations = {};
animations[data.axis.units.pos + '1'] = pos1Animation;
animations[data.axis.units.pos + '2'] = pos2Animation;
animations['opacity'] = {
begin: seq * delays,
dur: durations,
from: 0,
to: 1,
easing: 'easeOutQuart'
};

data.element.animate(animations);
}
});
</script>

</body></html>