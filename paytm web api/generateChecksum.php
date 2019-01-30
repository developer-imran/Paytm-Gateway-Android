<?php

require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !=0){
	throw new Exception('Request method must be POST!');
}

$content =  trim(file_get_contents("php://input"));

$decodedData = json_decode($content, true);

if(!empty($decodedData)){
//print_r($decodedData);die('okk');
	
	
	$paramList = array();

$paramList["MID"] = $decodedData["MID"]; //Provided by Paytm
$paramList["ORDER_ID"] = $decodedData["ORDER_ID"]; //unique OrderId for every request
$paramList["CUST_ID"] = $decodedData["CUST_ID"]; // unique customer identifier 
$paramList["INDUSTRY_TYPE_ID"] = $decodedData["INDUSTRY_TYPE_ID"]; //Provided by Paytm
$paramList["CHANNEL_ID"] = $decodedData["CHANNEL_ID"]; //Provided by Paytm
$paramList["TXN_AMOUNT"] = $decodedData["TXN_AMOUNT"]; // transaction amount
$paramList["WEBSITE"] = $decodedData["WEBSITE"];//Provided by Paytm
$paramList["CALLBACK_URL"] = $decodedData["CALLBACK_URL"];//Provided by Paytm
//$paramList["EMAIL"] = $decodedData["EMAIL"]; // customer email id
$paramList["MOBILE_NO"] = $decodedData["MOBILE_NO"]; // customer 10 digit mobile no.

$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	
	if(!empty($checkSum)){
		echo json_encode(array("CHECKSUMHASH"=>$checkSum,"ORDER_ID"=>$decodedData["ORDER_ID"],"STATUS=>1"));
	}else{
		echo json_encode(array("CHECKSUMHASH"=>$checkSum,"ORDER_ID"=>$decodedData["ORDER_ID"],"STATUS=>0"));
	}
	
}
     else{
	 echo "Something went wrong";
}
    if(!is_array($decodedData)){
	throw new Exception('Received content contained invalid JSON!');
}

?>