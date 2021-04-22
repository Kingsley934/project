<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
$firstname = "";
$lastname  = "";
$age       = "";
$counter =0;

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $counter = $counter +1;
    $response  = "CON Welcome to the MUST registration site \n";
    $response.="Enter your firstname";

}else if ($counter ==1) {
    // Business logic for first level response
    $firstname = $text;
    $counter = $counter + 1;
    $response = "CON Enter your lastname\n";
    

}else if ($counter ==2) {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $firstname_length = strlen($firstname)+1;
    $lastname = substr($text,$firstname_length);
    $counter = $counter + 1;
    $response = "CON Enter your age";

}else if($counter ==3) { 
    // This is a second level response where the user selected 1 in the first instance
    $lastname_length = strlen($lastname) + 1;
    $age = substr($text,$firstname_length+$lastname_length);

    // This is a terminal request. Note how we start the response with END
    $response = "END $firstname $lastname is aged $age";

}
header('Content-type: text/plain');
echo $response;