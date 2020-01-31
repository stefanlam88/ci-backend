<?php
$json = array(
	"location_name" => "Kuala Lumpur3",
	"location_state" => "2210",
	"location_country" => "129",
	"location_desc" => "test",
	"postcode_string" => "56000",
);

$URL = $APIURL."api/location/1";
$method = "PUT";
$json = json_encode($json);
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/location/<strong>[area_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[area_id]</strong>  required for API url"
);

$required[] = array(
	'p' => 'location_name',
	't' => 'varchar(32)',
	'd' => "<strong>location_name</strong>  required for API POST"
);

$required[] = array(
	'p' => 'location_state',
	't' => 'int(11)',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => 'location_country',
	't' => 'int(32)',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => 'location_desc',
	't' => 'text',
	'd' => "(Optional)"
);

$required[] = array(
	'p' => 'postcode_string',
	't' => 'text',
	'd' => "(Optional)"
);
?>
