<?php
$start_time = microtime(TRUE);

require_once( dirname('FILE').'/../../../../../wp-load.php' );
$options = get_option('wemovo-booking-tool');
$partner_token = $options['partner_token'];
$api_url = $options['api_url'];

$url= $api_url."/destinations/".$_GET['id'];
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
$headers = array();
$headers[] = 'Authorization: Token '.$partner_token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

echo $result;
// $end_time = microtime(TRUE);
// echo $end_time - $start_time;

 ?>
