<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$level = explode("*",$text);

if(isset($text)){
	if($text == ""){
		$response = "CON Welcome to the registration portal.\nPlease enter your full name";
	}
	
	if(isset($level[0]) && $level[0] !="" && !isset($level[1])){
		$response = "CON Hi ".$level[0].", enter your ward name";
	}else if(isset($level[1]) && $level[1] !="" && !isset($level[2])){
		$response = "CON Please enter your national ID number";
	}else if(isset($level[2]) && $level[2] !="" && !isset($level[3])){
		$data = array(
			'phonenumber'=>$phoneNumber, 
			'fullname'=>$level[1], 
			'electoral_ward' =>$level[2],
			'national_id'=>$level[3]
		);
		
		$response = "END Thank you for registering.We will keep you updated ".$level[1].", ".$level[2].", ".$level[3];
	}
	
header('Content-type: text/plain');
echo $response;
}
?>
