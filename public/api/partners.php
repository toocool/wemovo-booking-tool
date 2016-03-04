<?php
require_once( dirname('FILE').'/../../../../../wp-load.php' );
$options = get_option('wemovo-booking-tool');
$partner_token = $options['partner_token'];
$api_url = $options['api_url'];

$url = $api_url."/partners/";
$headers = array();
$fields = array(
	'facebook_id' => urlencode($_POST['facebook_id']),
	'analytics_id' => urlencode($_POST['analytics_id']),
	'mailchimp_id' => urlencode($_POST['mailchimp_id']),
);

foreach($fields as $key=>$value) {
    $fields_string .= $key.'='.$value.'&';
}
rtrim($fields_string, '&');

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

$headers[] = 'Authorization: Token '.$partner_token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result=curl_exec($ch);
curl_close($ch);
header('Content-Type: application/json');
echo $result;
 ?>
