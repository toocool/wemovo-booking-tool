<?php
$url="http://gds.wemovo.com/api/destinations/".$_GET['id'];
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
$headers = array();
$headers[] = 'Authorization: Token 31cd43a444fec801c44299abd62cab7871e37922';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

echo $result;
 ?>
