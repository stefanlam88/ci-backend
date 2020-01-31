<?php
//Create Location
$json = array(
	"location_name" => "Kuala Lumpur2",
	"location_state" => "2310",
	"location_country" => "129",
	"location_desc" => "location test",
	"postcode_string" => "56000",
);

$URL = $APIURL."api/location/";
$method = "POST";
$json = json_encode($json);
$response = call($URL, $json, $method);


$required[] = array(
	'p' => 'location_name',
	't' => 'varchar(32)',
	'd' => "<strong>location_name</strong>  required for API POST"
);

$required[] = array(
	'p' => 'location_state',
	't' => 'int(11)',
	'd' => "<strong>location_state</strong>  required for API POST"
);

$required[] = array(
	'p' => 'location_country',
	't' => 'int(32)',
	'd' => "<strong>location_country</strong>  required for API POST"
);

$required[] = array(
	'p' => 'location_desc',
	't' => 'text',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => 'postcode_string',
	't' => 'text',
	'd' => "<strong>postcode_string</strong>  required for API POST & split by , (Example: 56000,43000)"
);
?>
