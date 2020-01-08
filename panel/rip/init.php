<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}

define('DIRECT', TRUE);
require_once 'functions.php';
$user = new user;
$stats = new stats;
$TotalAttacks = $stats -> totalBoots($odb);
$RunningAttacks = $stats -> runningBoots($odb);
$TotalPools = $stats -> totalPools($odb);
$TotalUsers = $stats -> totalUsers($odb);

$siteinfo = $odb -> query("SELECT * FROM `settings` LIMIT 1");
while ($show = $siteinfo -> fetch(PDO::FETCH_ASSOC))
{
$sitename = $show['sitename'];
$description = $show['description'];
$maintaince = $show['maintaince'];
$paypal = $show['paypal'];
$bitcoin = $show['bitcoin'];
$siteurl = $show['url'];
$rotation = $show['rotation'];
$system = $show['system'];
$testboots = $show['testboots'];
$secretKey = $show['secretKey'];
$coinpayments = $show['coinpayments'];
$ipnSecret = $show['ipnSecret'];
$google_site = $show['google_site'];
$google_secret = $show['google_secret'];
$paypal_email = $show['paypal_email'];
$cooldown = $show['cooldown'];
$cloudflare_set = $show['cloudflare_set'];
$giftsystem = $show['giftsystem'];
$chances = $show['giftchances'];
}


?>
