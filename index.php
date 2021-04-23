<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
$firstname = "";

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to the MUST registration site \n";
    $response.="Enter your firstname";

}else if ($text != "") {
    // Business logic for first level response
    $firstname = $text;
    $response = "END Your name is $firstname\n";
    $response = "Thank You for Using our system";
}
header('Content-type: text/plain');
echo $response;