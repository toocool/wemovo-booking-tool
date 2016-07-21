<?php
$url="https://gds.wemovo.com/api/bus_op_urls/";
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);

$headers = array();
$headers[] = 'Authorization: Token '.$_GET['token'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
header('Content-Type: application/json');
echo $result;
 ?>
