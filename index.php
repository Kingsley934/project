<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

//application variables
$title = "";
$title_length = null;
$name  = "";
$name_length = null;
$center_code = "";
$center_code_length = null;
$female_children = "";
$female_children_length =null;
$male_children   = "";
$male_children_length = null;
$teachers="";
$teachers_length = null;


if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON TONSE Training Programme \n";
    $response  .= "Welcome, please provide accurate information\n";
    $response.="Choose your title below: \n";
	$response .="1. Mr\n";
	$response .="2. Mrs\n";
	$response .="3. Miss";

}else if ($text != "") {
	if($title == ""){
		$checker = $text;
	    if($checker == "1"){
			$title = "Mr.";
			$response ="Enter your lastname: ";
	    }else if($checker == "2"){
			$title = "Mrs.";
			$response ="Enter your lastname: ";
	    }else if($checker == "3"){
			$title = "Miss";
			$response ="Enter your lastname: ";
			
	    }else{
			$response = "END invalid input entered, please try again!";	
	    }
	}else if($title != "" && $name == ""){
		$title_length = strlen($title)+1;
		$name = substr($text,$title_length);
		$name_length = strlen($name) + 1;
		$response = "CON Enter your center code: ";	
	}else if($name != "" && $center_code ==""){
		
		$total_length = $title_length + $name_length;
		$center_code = substr($text,$total_length);
		$center_code_length = strlen($center_code) + 1;
		$response = "CON Enter number of female children present today: ";
		
	}else if($center_code != "" && $female_children ==""){
		$total_length = $title_length + $name_length + $center_code_length;
		$female_children= substr($text,$total_length);
		$female_children_length = strlen($female_children)+1;
		$response = "CON Enter number of male children present today: ";
		
		
	}else if($female_children != "" && $male_children== ""){
		$total_length = $title_length + $name_length + $center_code_length + $female_children_length;
		$male_children = substr($text,$total_length);
		$male_children_length = strlen($male_children)+1;
		$response = "How many teachers were present today?";
	
	}else if($male_children != "" && $teachers ==""){
		$total_length = $total_length = $title_length + $name_length + $center_code_length + $female_children_length + $male_children_length;
		$teachers = substr($text, $total_length);
		$response = "END Thank you for your time...";
		
	}
}
header('Content-type: text/plain');
echo $response;