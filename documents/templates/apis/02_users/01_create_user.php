<?php
//Encrypt Password
$json = array();
$URL = $APIURL."api/auth/encryption/123456";
$method = "GET";
$json = json_encode($json);
$password = call($URL, $json, $method);

//Create User
$json = array(
	"firstname" => "Kenneth",
	"lastname" => "Cham",
	"contact" => "60123456789",
	"username" => "kennethcham@byte2c.com",
	"email" => "kennethcham@byte2c.com",
	"address" => "X2 Residency",
	"password" => $password['data']['keys'],
	"status" => 1,
	"roles" => "admin"
);

$URL = $APIURL."api/user/";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required = array();
$required[] = array(
	'p' => 'firstname',
	't' => 'varchar(256)',
	'd' => "<strong>firstname</strong>  required for API POST"
);

$required[] = array(
	'p' => 'lastname',
	't' => 'varchar(256)',
	'd' => "<strong>lastname</strong>  required for API POST"
);

$required[] = array(
	'p' => 'contact',
	't' => 'varchar(256)',
	'd' => "<strong>contact</strong>  required for API POST"
);

$required[] = array(
	'p' => 'email',
	't' => 'varchar(256)',
	'd' => "<strong>email</strong>  required for API POST"
);

$required[] = array(
	'p' => 'address',
	't' => 'varchar(512)',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => 'username',
	't' => 'varchar(256)',
	'd' => "<strong>address</strong>  required for API POST"
);

$required[] = array(
	'p' => 'password',
	't' => 'text',
	'd' => "<strong>address</strong>  required for API POST"
);

$required[] = array(
	'p' => 'roles',
	't' => 'varchar(32)',
	'd' => "<strong>roles</strong>  required for API POST"
);

?>
