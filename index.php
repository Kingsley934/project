<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];


if ($text == "") {
	// This is the first request. Note how we start the response with CON
    	$response    = "CON TONSEFE Training Programmes \n";
    	$response   .= "Welcome, please provide accurate information\n";
    	$response   .= "Choose your title below: \n";
    	$response   .= "1. Mr\n";
    	$response   .= "2. Mrs\n";
    	$response   .= "3. Miss";
	
}else if($text != ""){
	if(strlen($text) == 1){
		$checker = $text;
		if($checker == "1"){
			$GLOBALS['title'] = "Mr.";
		}else if($checker == "2"){
			$GLOBALS['title'] = "Mrs.";
		}else if($checker == "3"){
			$GLOBALS['title'] = "Miss";
		}else{
			$response = "END Invalid input entered...";
		}
	}else if(strlen($text) > 1){
		$response = "END Thank you for using our system ".$GLOBALS['title']; 
	
	}

}
header('Content-type: text/plain');
echo $response;
