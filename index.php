<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$level = explode("*",$text);

if(isset($text)){
	if($text == ""){
		$response = "CON TONSEFE Training Programmes \nProvide us with accurate information\n\n Choose your title below";
		$response .= "1. Mr\n";
		$response .= "2. Mrs\n";
		$response .= "3. Miss\n";
	}
	
	if(isset($level[0]) && $level[0] !="" && !isset($level[1])){ 
		if($level[0] != "1" && $level[0] != "2" && $level[0] != "3"){
			$response = "END Invalid input. Please try Again!";
		
		}else{
			$response = "CON Enter your First Name: ";
		}
		
	}else if(isset($level[1]) && $level[1] !="" && !isset($level[2])){
		$level[1] = trim($level[1]);
		$level[1] = stripslashes($level[1]);
		$level[1] = strtolower($level[1]);
		$level[1] = ucfirst($level[1]);
		if(!preg_match("/^[a-zA-Z ]*$/",$level[1])){
			$response = "END Invalid input. Please try Again!";
		}else{
			$response = "CON Enter your Last Name: ";
		}
		
	}else if(isset($level[2]) && $level[2] !="" && !isset($level[3])){
		$level[2] = trim($level[2]);
		$level[2] = stripslashes($level[2]);
		$level[2] = strtolower($level[2]);
		$level[2] = ucfirst($level[2]);
		if(!preg_match("/^[a-zA-Z ]*$/",$level[2])){
			$response = "END Invalid input. Please try Again!";
		}else{
			$response = "CON Enter your Centre Name: ";
		}
		
		
	}else if(isset($level[3]) && $level[3] !="" && !isset($level[4])){
		$level[3] = trim($level[3]);
		$level[3] = stripslashes($level[3]);
		$level[3] = strtolower($level[3]);
		$level[3] = ucfirst($level[3]);
		if(!preg_match("/^[a-zA-Z ]*$/",$level[3])){
			$response = "END Invalid input. Please try Again!";
		}else{
			$response = "CON What is the number of female children that attended the program today: ";
		}
		
		
	}else if(isset($level[4]) && $level[4] !="" && !isset($level[5])){
		if(is_numeric($level[4])){
			$response = "CON What is the number of male children that attended the program today: ";
		}else{
			$response = "END Invalid input. Please try Again!";
		}
		
		
	}else if(isset($level[5]) && $level[5] !="" && !isset($level[6])){
		if(is_numeric($level[5])){
			$response = "CON Enter total number of teachers that attended the program today: ";
		}else{
			$response = "END Invalid input. Please try Again!";
		}
		
		
	}else if(isset($level[6]) && $level[6] !="" && !isset($level[7])){
		if(is_numeric($level[6])){
			$response = "CON Data Successfully Submitted!\n Thank you ".$level[0]." ".$level[2];
		}else{
			$response = "END Invalid input. Please try Again!";
		}
		
		
	}
	
header('Content-type: text/plain');
echo $response;
}
?>
