<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$counter = 0;
$text        = $_POST["text"];


if ($text == "") {
	// This is the first request. Note how we start the response with CON
    	$response  = "CON TONSE Training Programme \n";
    	$response  .= "Welcome, please provide accurate information\n";
    	$response.="Choose your title below: \n";
    	$response .="1. Mr\n";
    	$response .="2. Mrs\n";
    	$response .="3. Miss";
}else if ($text != "") {
	if($counter == 0){
		$checker = $text;
		if($checker == "1"){
			$GLOBALS['title'] ="Mr.";
			$counter = $counter +1;
		}else if($checker =="2"){
			$GLOBALS['title'] = "Mrs.";
			$counter = $counter +1;
		}else if($checker =="3"){
			$GLOBALS['title'] = "Miss";
			$counter = $counter +1;
		}else{
			$response ="END invalid input, please try again...!";
		}
		$GLOBALS['title_length'] = strlen($GLOBALS['title'];
	}else if($counter == 1){
		$response = "END thank you ".$GLOBALS['title']." ".$GLOBALS['title_length'];
	}
	
	
	
}
header('Content-type: text/plain');
echo $response;
