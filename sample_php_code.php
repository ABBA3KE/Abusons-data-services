<?php
$API_KEY = "your mobile vtu api key";
$API_TOKEN = "your mobile vtu api token";
//Prepare the post body
$POSTS = array("operator"=>"9mobile","type"=>"airtime","value"=>"300","phone"=>"2347088538551");
//Send request via cURL
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.mobilevtu.com/v1/".$API_KEY."/topup");
curl_setopt($ch,CURLOPT_POST, count($POSTS));
curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($POSTS));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
$headers = array (
	'Api-Token: '.$API_TOKEN,
	'Request-Id: '.time(),
	'content-type: application/x-www-form-urlencoded'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = curl_exec ($ch); 
if (curl_errno($ch)) {
	//There seem to be a connection error stored in curl_errno($ch)
	echo 'connection error occured! '.curl_errno($ch);
}
curl_close ($ch);
//decode the json response into an object so we can get the transaction staus and ID
$json_output = json_decode($server_output,true);
if($json_output['status']=="success") {
	//the request was successful
	$transaction_reference = $json_output['data']['transaction_id'];
	$transaction_status = $json_output['data']['transaction_status']; //usually completed indicates a succesful topup
} else {
	
	echo $json_output['message'];
}


$API_KEY = "your mobile vtu api key";
$API_TOKEN = "your mobile vtu api token";

$POSTS = array('operator'=>'MTN','type'=>'data','value'=>'1GB','phone'=>'23431234567');

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.mobilevtu.com/v1/".$API_KEY."/topup");
curl_setopt($ch,CURLOPT_POST, count($POSTS));
curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($POSTS));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
$headers = array (
	'Api-Token: '.$API_TOKEN,
	'Request-Id: '.time(),
	'content-type: application/x-www-form-urlencoded'
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = curl_exec ($ch); 
if (curl_errno($ch)) {
	
	echo 'connection error occured! '.curl_errno($ch);
}
curl_close ($ch);

$json_output = json_decode($server_output,true);
if($json_output['status']=="success") {

	$transaction_reference = $json_output['transaction_id'];
	$transaction_status = $json_output['transaction_status']; //usually completed indicates successful transaction 
} else {
	
	echo $json_output['message'];
}

/* 	====== Data Plan Codes 
	Please use the Fetch Data Plan List API to get accurate and up-to-date list
	
Operator	   Code	 Price (NGN)
-------------------------------
9mobile		1GB		1,100 NGN
9mobile		1.5GB	1,300 NGN
9mobile		2.5GB	2,200 NGN
9mobile		4GB		3,100 NGN
9mobile		11.5GB	8,000 NGN
9mobile		15GB	10,000 NGN
9mobile		27GB	18,000 NGN
9mobile		500MB	600 NGN
Airtel		1.5GB	1,050 NGN
Airtel		3.5GB	2,200 NGN
Airtel		7GB		5,000 NGN
Airtel		10GB	5,500 NGN
Airtel		16GB	8,200 NGN
Airtel		22GB	10,000 NGN
Glo			62.5GB	16,300 NGN
Glo			2GB		1,500 NGN
Glo			4.5GB	2,500 NGN
Glo			8.75GB	3,500 NGN
Glo			12.5GB	4,200 NGN
Glo			15.6GB	5,000 NGN
Glo			25GB	7,100 NGN
MTN			22GB	10,000 NGN
MTN			10GB	5,000 NGN
MTN			5GB		2,600 NGN
MTN			2GB		1,100 NGN
MTN			1GB		600 NGN

======================================= */