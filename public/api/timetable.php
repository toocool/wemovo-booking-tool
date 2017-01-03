<?php
$start_time = microtime(TRUE);

require_once( dirname('FILE').'/../../../../../wp-load.php' );
$options = get_option('wemovo-booking-tool');

if($_GET['station_from']) {
  $url="https://iberocoach.wemovo.com/api/v1/portal/station_timetable/departures/".$_GET['station_from']."/?format=json";
}else{
  $url="https://iberocoach.wemovo.com/api/v1/portal/station_timetable/departures/".$_GET['station_to']."/?format=json";
}

//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing

if(curl_error($ch))
{
    echo 'error:' . curl_error($ch);
}
$result=curl_exec($ch);
curl_close($ch);
header('Content-Type: application/json');
echo $result;

 ?>
