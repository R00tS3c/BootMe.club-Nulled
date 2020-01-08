<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'sst');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('ERROR_MESSAGE', '<style>
body 
{
	background-color: black;
	color:white;
}
.alert-danger
{
	color:red;
}
.alert-success
{
	color:lime;
}
</style><span style="color: red;">Some problems on our side, come back later!');

	try {
		$odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
	} catch( PDOException $Exception ) {
		error_log('ERROR: '.$Exception->getMessage().' - '.$_SERVER['REQUEST_URI'].' at '.date('l jS \of F, Y, h:i:s A')."\n", 3, 'errorx.log');
		die(ERROR_MESSAGE);
	}

	function error($string){  
		return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>ERROR:</strong> '.$string.'</div>';
	}

	function success($string) {
		return '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>SUCCESS:</strong> '.$string.'</div>';
	}
	
	//set timezone
date_default_timezone_set('europe/madrid');
?>
