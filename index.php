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
    	$response  = "CON TONSE Training Programmes \n";
    	$response  .= "Welcome, please provide accurate information\n";
    	$response.="Choose your title below: \n";
    	$response .="1. Mr\n";
    	$response .="2. Mrs\n";
    	$response .="3. Miss";
}else if ($text != "") {
	$checker = $text;
	$response = "END thank you ".$checker;
	
}
header('Content-type: text/plain');
echo $response;