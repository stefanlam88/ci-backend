
<?php

$URL = $APIURL."api/location/1";
$method = "GET";
$json = json_encode(array());
$response = call($URL, $json, $method);

$required[] = array(
	'p' => $APIURL."api/location/<strong>[area_id]</strong>",
	't' => 'int(11)',
	'd' => "<strong>[area_id]</strong>   required for API url"
);
?>
