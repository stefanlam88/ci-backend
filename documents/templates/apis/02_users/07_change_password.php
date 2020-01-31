<?php
//Encrypt Password
$json = array();
$URL = $APIURL."api/auth/encryption/12345678";
$method = "GET";
$json = json_encode($json);
$password = call($URL, $json, $method);

//Encrypt Password
$json = array();
$URL = $APIURL."api/auth/encryption/12345678";
$method = "GET";
$json = json_encode($json);
$cpassword = call($URL, $json, $method);

//Create User
$json = array(
	"password" => $password['data']['keys'],
	"confirm_password" => $cpassword['data']['keys']
);

$URL = $APIURL."api/user/2/password";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "password",
	't' => 'text',
	'd' => "<strong>password</strong>  required for API PUT"
);

$required[] = array(
	'p' => "confirm_password",
	't' => 'text',
	'd' => "<strong>confirm_password</strong>  required for API PUT"
);
?>
