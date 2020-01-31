<?php
$json = array(
	"firstname" => "Kevin",
	"lastname" => "Chew",
	"contact" => "60123456789",
	"email" => "kevinmvp@byte2c.com",
	"address" => "X2 Residency",
	"status" => 1,
	"roles" => "admin"
);

$URL = $APIURL."api/user/1";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required = array();

$required[] = array(
	'p' => $APIURL."api/user/<strong>[user_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[user_id]</strong>  required for API url"
);

$required[] = array(
	'p' => "firstname",
	't' => 'varchar(256)',
	'd' => "<strong>firstname</strong>  required for API PUT"
);

$required[] = array(
	'p' => "lastname",
	't' => 'varchar(256)',
	'd' => "<strong>lastname</strong>  required for API PUT"
);

$required[] = array(
	'p' => "email",
	't' => 'varchar(256)',
	'd' => "<strong>email</strong>  required for API PUT"
);

$required[] = array(
	'p' => "contact",
	't' => 'varchar(20)',
	'd' => "<strong>contact</strong>  required for API PUT"
);

$required[] = array(
	'p' => "address",
	't' => 'varchar(512)',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => "status",
	't' => 'varchar(10)',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => "roles",
	't' => 'varchar(32)',
	'd' => "roles {active|inactive} (Optional)"
);
?>
