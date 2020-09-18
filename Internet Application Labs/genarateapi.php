<?php
include_once 'DBConnector.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	
	header('HTTP/1.0 403 FORBIDDEN');
	echo 'Sorry... You are Forbidden';
}
else {
	
	$api_key = null;
	$api_key = generateApiKey(64);
	header('Content-type: application/json');
	echo generateResponse($api_key);
}

function generateApiKey($str_length){
	
	$chars = '0987651234zxcvbnmlkjhgfdASQWERTYUIOP';
	$bytes = openssl_random_pseudo_bytes(3*$str_length/4+1);
	$repl = unpack('C2', $bytes);
	
	$first = $chars[$repl[1]%62];
	$second = $chars[$repl[2]%62];
	
	return strtr(substr(base64_encode($bytes), 0, $str_length), '+', "$first$second");
}
function saveApiKey(){
	
	
}

function generateResponse($api_key){
	if(saveApiKey()){
		$res = ['sucess' => 1, 'message' => $api_key];
	} else{
		$res = ['sucess' => 0, 'message' => 'Something went wrong. Please regenerate the api key'];
	}
	return json_encode($res);
	}

?>