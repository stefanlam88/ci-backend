<?php
$json = array();
$URL = $APIURL."api/auth/encryption/123456";
$method = "GET";
$json = json_encode($json);
$response = call($URL, $json, $method);

$json = array(
	"username" => "admin@locahost.com",
	"password" => $response['data']['keys'],
);

$URL = $APIURL."api/auth/login";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required = array();
$required[] = array(
	'p' => 'username',
	't' => 'varchar(256)',
	'd' => "<strong>username</strong>  required for API POST"
);

$required[] = array(
	'p' => 'password',
	't' => 'varchar(256)',
	'd' => "<strong>password</strong>  required for API POST"
);

?>
