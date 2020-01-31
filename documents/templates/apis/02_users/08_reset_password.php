<?php
//Reset Password
$json = array(
	"email_address" => "admin@locahost.com"
);

$URL = $APIURL."api/user/password/forget";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => "email_address",
	't' => 'varchar(256)',
	'd' => "<strong>email_address</strong>  required for API POST"
);
?>
